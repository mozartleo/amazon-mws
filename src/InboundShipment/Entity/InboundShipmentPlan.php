<?php

namespace WebPapers\Amazon\InboundShipment\Entity;

final class InboundShipmentPlan
{
    /** @var string */
    public $ShipmentId;

    /** @var string */
    public $DestinationFulfillmentCenterId;

    /** @var Address */
    public $ShipToAddress;

    /** @var string */
    public $LabelPrepType;

    /** @var array */
    public $Items;

    /** @var array */
    public $EstimatedBoxContentsFee;

    public function __construct()
    {
        $this->Items = [];
    }

    /**
     * @return string
     */
    public function getShipmentId()
    {
        return $this->ShipmentId;
    }

    /**
     * @param string $ShipmentId
     * @return InboundShipmentPlan
     */
    public function setShipmentId(string $ShipmentId)
    {
        $this->ShipmentId = $ShipmentId;

        return $this;
    }

    /**
     * @return string
     */
    public function getDestinationFulfillmentCenterId()
    {
        return $this->DestinationFulfillmentCenterId;
    }

    /**
     * @param string $DestinationFulfillmentCenterId
     * @return InboundShipmentPlan
     */
    public function setDestinationFulfillmentCenterId(string $DestinationFulfillmentCenterId)
    {
        $this->DestinationFulfillmentCenterId = $DestinationFulfillmentCenterId;

        return $this;
    }

    /**
     * @return Address
     */
    public function getShipToAddress()
    {
        return $this->ShipToAddress;
    }

    /**
     * @param Address $ShipToAddress
     * @return InboundShipmentPlan
     */
    public function setShipToAddress(Address $ShipToAddress)
    {
        $this->ShipToAddress = $ShipToAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabelPrepType()
    {
        return $this->LabelPrepType;
    }

    /**
     * @param string $LabelPrepType
     * @return InboundShipmentPlan
     */
    public function setLabelPrepType(string $LabelPrepType)
    {
        $this->LabelPrepType = $LabelPrepType;

        return $this;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->Items;
    }

    /**
     * @param array $Items
     * @return InboundShipmentPlan
     */
    public function setItems(array $Items)
    {
        $this->Items = $Items;

        return $this;
    }

    /**
     * @return array
     */
    public function getEstimatedBoxContentsFee()
    {
        return $this->EstimatedBoxContentsFee;
    }

    /**
     * @param array $EstimatedBoxContentsFee
     * @return InboundShipmentPlan
     */
    public function setEstimatedBoxContentsFee(array $EstimatedBoxContentsFee)
    {
        $this->EstimatedBoxContentsFee = $EstimatedBoxContentsFee;

        return $this;
    }
}
