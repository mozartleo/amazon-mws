<?php

namespace WebPapers\Amazon\Common;

use ErrorException;
use Exception;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use WebPapers\Amazon\Common\Serializer\SerializerInterface;
use WebPapers\Amazon\Credentials\CredentialsAwareInterface;
use WebPapers\Amazon\Credentials\CredentialsAwareTrait;

abstract class Client implements ClientInterface, CredentialsAwareInterface
{
    const API_VERSION = '';
    const API_SECTION = '';

    use CredentialsAwareTrait;

    /** @var GuzzleClient */
    private $guzzle;

    /** @var Serializer\Serializer */
    private $serializer;

    /** @var UriInterface */
    private $uri;

    public function __construct(SerializerInterface $serializer = null)
    {
        $this->guzzle = new GuzzleClient;
        $this->serializer = $serializer ?? new Serializer\Serializer;
        $this->uri = new Uri(vsprintf('https://%s/%s/%s', ['mws.amazonservices.com', static::API_SECTION, static::API_VERSION]));
    }

    /**
     * @param RequestInterface $request
     * @param int $throttle
     * @return PromiseInterface
     */
    protected function send(RequestInterface $request, $throttle = 30)
    {
        return $this->guzzle
            ->sendAsync($this->handleRequest($request))
            ->then(
                function (ResponseInterface $response) {
                    $contents = $response->getBody()->getContents();
                    $contents = $this->serializer->unserialize($contents);

                    if ($contents instanceof ResponseInterface) {
                        $result = $contents->getResult();

                        if ($result instanceof IterableResultInterface) {
                            $result->setClient($this);
                        }

                        return $result;
                    }
                    else {
                        return $contents;
                    }
                },
                function (Exception $e) use ($throttle, $request) {
                    $contents = $e->getResponse()->getBody()->getContents();

                    if (false !== preg_match_all('#<(Type|Code|Message)>(.*?)</#si', $contents, $matches)) {
                        $error = array_combine($matches[1], $matches[2]);

                        if ($error['Code'] == 'RequestThrottled') {
                            sleep($throttle);
                            return $this->send($request, $throttle);
                        }

                        throw new ErrorException($error['Message']);
                    } else {
                        throw new ErrorException($e->getMessage());
                    }
                }
            );
    }

    private function handleRequest(RequestInterface $request)
    {
        return new Request('POST', $this->uri, [
            'Content-Type' => 'application/x-www-form-urlencoded; charset=utf-8',
            'Expect'       => ''
        ], $this->buildQuery($request));
    }

    private function buildQuery(RequestInterface $request)
    {
        $credentials = $this->getCredentials();

        $parameters = (array)$this->serializer->serialize($request);
        $parameters = array_merge($parameters, [
            'SellerId'         => $credentials->getSellerId(),
            'AWSAccessKeyId'   => $credentials->getAWSAccessKeyId(),
            'MWSAuthToken'     => $credentials->getMWSAuthToken(),
            //
            'SignatureMethod'  => 'HmacSHA256',
            'SignatureVersion' => 2,
            'Timestamp'        => $this->gmdate(),
            'Version'          => static::API_VERSION
        ]);

        uksort($parameters, 'strcmp');

        $query = [];
        foreach ($parameters as $k => $v) {
            $query[] = sprintf('%s=%s', $k, $this->urlencode_rfc3986((string)$v));
        }

        $query[] = 'Signature=' . $this->calculateSignature(implode('&', $query), $credentials->getSecretKey());

        return implode('&', $query);
    }

    /**
     * Return UTC timestamp.
     *
     * @return string
     *
     * @codeCoverageIgnore
     */
    private function gmdate()
    {
        return gmdate('Y-m-d\TH:i:s\Z');
    }

    private function urlencode_rfc3986($value)
    {
        return str_replace(['+', '%7E'], [' ', '~'], rawurlencode($value));
    }

    private function calculateSignature($query, $secretKey)
    {
        $head = sprintf("POST\n%s\n/%s/%s\n%s", 'mws.amazonservices.com', static::API_SECTION, static::API_VERSION, $query);

        $sig = hash_hmac('sha256', $head, $secretKey, true);

        return $this->urlencode_rfc3986(base64_encode($sig));
    }
}