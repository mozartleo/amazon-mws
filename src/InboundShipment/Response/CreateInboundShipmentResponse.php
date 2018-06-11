<?php

namespace WebPapers\Amazon\InboundShipment\Response;

use WebPapers\Amazon\Common\ResponseInterface;
use WebPapers\Amazon\InboundShipment\Entity\ResponseMetadata;
use WebPapers\Amazon\InboundShipment\Result\CreateInboundShipmentResult;

final class CreateInboundShipmentResponse implements ResponseInterface
{
    /**
     * @var CreateInboundShipmentResult
     */
    public $CreateInboundShipmentResult;

    /**
     * @var ResponseMetadata
     */
    public $ResponseMetadata;

    /**
     * {@inheritDoc}
     */
    public function getResult()
    {
        return $this->CreateInboundShipmentResult;
    }
}