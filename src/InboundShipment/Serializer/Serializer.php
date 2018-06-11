<?php

namespace WebPapers\Amazon\InboundShipment\Serializer;

use DateTimeInterface;
use ReflectionClass;
use ReflectionProperty;
use UnexpectedValueException;

use WebPapers\Amazon\Common\RequestInterface;
use WebPapers\Amazon\Common\Serializer\Serializer as BaseSerializer;
use WebPapers\Amazon\Common\Serializer\SerializerInterface;
use WebPapers\Amazon\InboundShipment\Request;

class Serializer extends BaseSerializer implements SerializerInterface
{
    /**@var \Sabre\Xml\Service */
    private $xmlDeserializer;

    public function __construct()
    {
        $this->xmlDeserializer = new XmlDeserializer;
    }

    public function serialize(RequestInterface $request)
    {
        switch (true) {
            case $request instanceof Request\CreateInboundShipmentPlanRequest;
                $action = 'CreateInboundShipmentPlan';
                break;

            case $request instanceof Request\CreateInboundShipmentRequest;
                $action = 'CreateInboundShipment';
                break;

            case $request instanceof Request\UpdateInboundShipmentRequest:
                $action = 'UpdateInboundShipment';
                break;

            default:
                throw new UnexpectedValueException(get_class($request) . ' is not supported.');
        }

        return $this->serializeProperties($action, $request);
    }

    /**
     * {@inheritDoc}
     */
    public function unserialize($response)
    {
        return $this->xmlDeserializer->parse($response);
    }
}
