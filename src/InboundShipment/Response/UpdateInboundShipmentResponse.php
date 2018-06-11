<?php

namespace WebPapers\Amazon\InboundShipment\Response;

use WebPapers\Amazon\Common\ResponseInterface;
use WebPapers\Amazon\InboundShipment\Entity\ResponseMetadata;
use WebPapers\Amazon\InboundShipment\Result\UpdateInboundShipmentResult;

/**
 * Class UpdateInboundShipmentResponse
 * @package WebPapers\Amazon\InboundShipment\Response
 */
final class UpdateInboundShipmentResponse implements ResponseInterface
{
    /**
     * @var UpdateInboundShipmentResult
     */
    public $UpdateInboundShipmentResult;

    /**
     * @var ResponseMetadata
     */
    public $ResponseMetadata;

    /**
     * {@inheritDoc}
     */
    public function getResult()
    {
        return $this->UpdateInboundShipmentResult;
    }
}