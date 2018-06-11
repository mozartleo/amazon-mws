<?php

namespace WebPapers\Amazon\InboundShipment\Result;

use WebPapers\Amazon\Common\ResultInterface;

final class UpdateInboundShipmentResult implements ResultInterface
{
    /**
     * @var string
     */
    public $ShipmentId;
}
