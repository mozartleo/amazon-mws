<?php

namespace WebPapers\Amazon\InboundShipment\Entity;

/**
 * The manual processing fee per unit and total fee for a shipment.
 */
final class BoxContentsFeeDetails
{
    /** @var int */
    public $TotalUnits;

    /** @var Amount */
    public $FeePerUnit;

    /** @var Amount */
    public $TotalFee;
}
