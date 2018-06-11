<?php

namespace WebPapers\Amazon\InboundShipment;

use WebPapers\Amazon\Common\Client as BaseClient;
use WebPapers\Amazon\Common\Serializer\SerializerInterface;
use WebPapers\Amazon\InboundShipment\Serializer\Serializer;

class Client extends BaseClient implements ClientInterface
{
    use ClientTrait;

    const API_VERSION = '2010-10-01';
    const API_SECTION = 'FulfillmentInboundShipment';

    public function __construct(SerializerInterface $serializer = null)
    {
        parent::__construct($serializer ?? new Serializer);
    }
}