<?php

namespace WebPapers\Amazon\Credentials;

final class Credentials implements CredentialsInterface
{
    /** @var string */
    private $sellerId;

    /** @var string */
    private $awsAccessKeyId;

    /** @var string */
    private $secretKey;

    /** @var string */
    private $mwsAuthToken;

    /**
     * Credentials constructor.
     * @param string $sellerId
     * @param string $awsAccessKeyId
     * @param string $secretKey
     * @param string $mwsAuthToken
     */
    public function __construct(string $sellerId, string $awsAccessKeyId, string $secretKey, string $mwsAuthToken = '')
    {
        $this->sellerId = $sellerId;
        $this->awsAccessKeyId = $awsAccessKeyId;
        $this->secretKey = $secretKey;
        $this->mwsAuthToken = $mwsAuthToken;
    }

    /**
     * @return string
     */
    public function getSellerId(): string
    {
        return $this->sellerId;
    }

    /**
     * @return string
     */
    public function getAWSAccessKeyId(): string
    {
        return $this->awsAccessKeyId;
    }

    /**
     * @return string
     */
    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    /**
     * @return string
     */
    public function getMWSAuthToken(): string
    {
        return $this->mwsAuthToken;
    }
}