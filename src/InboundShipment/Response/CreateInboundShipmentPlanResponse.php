<?php

namespace WebPapers\Amazon\InboundShipment\Response;

use WebPapers\Amazon\Common\ResponseInterface;
use WebPapers\Amazon\InboundShipment\Result\CreateInboundShipmentPlanResult;

final class CreateInboundShipmentPlanResponse implements ResponseInterface
{
    /** @var CreateInboundShipmentPlanResult */
    public $CreateInboundShipmentPlanResult;

    /** @var array */
    public $ResponseMetadata;

    /**
     * {@inheritDoc}
     */
    public function getResult()
    {
        return $this->CreateInboundShipmentPlanResult;
    }
}