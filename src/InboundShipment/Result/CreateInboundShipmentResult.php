<?php

namespace WebPapers\Amazon\InboundShipment\Result;

use WebPapers\Amazon\Common\ResultInterface;

/**
 * Result object.  Returned by CreateInboundShipmentPlanResponse.
 */
final class CreateInboundShipmentResult implements ResultInterface
{
    /**
     * @var string
     */
    public $ShipmentId;
}
