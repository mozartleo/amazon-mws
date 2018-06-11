<?php

namespace WebPapers\Amazon\InboundShipment\Result;

use WebPapers\Amazon\Common\ResultInterface;

final class CreateInboundShipmentPlanResult implements ResultInterface
{
    /** @var array */
    public $InboundShipmentPlans;

    public function __construct()
    {
        $this->InboundShipmentPlans = [];
    }

    /**
     * @return array
     */
    public function getInboundShipmentPlans(): array
    {
        return $this->InboundShipmentPlans;
    }

    /**
     * @param array $InboundShipmentPlans
     * @return CreateInboundShipmentPlanResult
     */
    public function setInboundShipmentPlans(array $InboundShipmentPlans): CreateInboundShipmentPlanResult
    {
        $this->InboundShipmentPlans = $InboundShipmentPlans;

        return $this;
    }
}
