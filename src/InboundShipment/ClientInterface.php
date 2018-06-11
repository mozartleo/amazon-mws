<?php

namespace WebPapers\Amazon\InboundShipment;

use WebPapers\Amazon\InboundShipment\Request\CreateInboundShipmentPlanRequest;
use WebPapers\Amazon\InboundShipment\Request\CreateInboundShipmentRequest;
use WebPapers\Amazon\InboundShipment\Request\UpdateInboundShipmentRequest;
use WebPapers\Amazon\InboundShipment\Response\CreateInboundShipmentPlanResponse;
use WebPapers\Amazon\InboundShipment\Response\CreateInboundShipmentResponse;
use WebPapers\Amazon\InboundShipment\Response\UpdateInboundShipmentResponse;

interface ClientInterface
{
    /**
     * @param CreateInboundShipmentPlanRequest $request
     * @return CreateInboundShipmentPlanResponse
     */
    function createInboundShipmentPlan(CreateInboundShipmentPlanRequest $request);

    /**
     * @param CreateInboundShipmentRequest $request
     * @return CreateInboundShipmentResponse
     */
    function createInboundShipment(CreateInboundShipmentRequest $request);

    /**
     * @param UpdateInboundShipmentRequest $request
     * @return UpdateInboundShipmentResponse
     */
    function updateInboundShipment(UpdateInboundShipmentRequest $request);
}