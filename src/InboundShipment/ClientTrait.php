<?php

namespace WebPapers\Amazon\InboundShipment;

use WebPapers\Amazon\InboundShipment\Request\CreateInboundShipmentPlanRequest;
use WebPapers\Amazon\InboundShipment\Request\CreateInboundShipmentRequest;
use WebPapers\Amazon\InboundShipment\Request\UpdateInboundShipmentRequest;
use WebPapers\Amazon\InboundShipment\Response\CreateInboundShipmentPlanResponse;
use WebPapers\Amazon\InboundShipment\Response\CreateInboundShipmentResponse;
use WebPapers\Amazon\InboundShipment\Response\UpdateInboundShipmentResponse;

trait ClientTrait
{
    /**
     * @param CreateInboundShipmentPlanRequest $request
     * @return CreateInboundShipmentPlanResponse
     */
    function createInboundShipmentPlan(CreateInboundShipmentPlanRequest $request)
    {
        return $this->send($request, 2)->wait();
    }

    /**
     * @param CreateInboundShipmentRequest $request
     * @return CreateInboundShipmentResponse
     */
    function createInboundShipment(CreateInboundShipmentRequest $request)
    {
        return $this->send($request, 2)->wait();
    }

    /**
     * @param UpdateInboundShipmentRequest $request
     * @return UpdateInboundShipmentResponse
     */
    function updateInboundShipment(UpdateInboundShipmentRequest $request)
    {
        return $this->send($request, 2)->wait();
    }
}