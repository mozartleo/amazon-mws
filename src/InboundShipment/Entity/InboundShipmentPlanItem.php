<?php

namespace WebPapers\Amazon\InboundShipment\Entity;

final class InboundShipmentPlanItem
{
    /**
     * @var string
     */
    public $SellerSKU;

    /**
     * @var string
     */
    public $FulfillmentNetworkSKU;

    /**
     * @var int
     */
    public $Quantity;

    /**
     * @var array
     */
    public $PrepDetailsList;

    public function __construct()
    {
        $this->PrepDetailsList = [];
    }

    /**
     * @return string
     */
    public function getSellerSKU()
    {
        return $this->SellerSKU;
    }

    /**
     * @param string $SellerSKU
     * @return InboundShipmentPlanItem
     */
    public function setSellerSKU(string $SellerSKU)
    {
        $this->SellerSKU = $SellerSKU;

        return $this;
    }

    /**
     * @return string
     */
    public function getFulfillmentNetworkSKU()
    {
        return $this->FulfillmentNetworkSKU;
    }

    /**
     * @param string $FulfillmentNetworkSKU
     * @return InboundShipmentPlanItem
     */
    public function setFulfillmentNetworkSKU(string $FulfillmentNetworkSKU)
    {
        $this->FulfillmentNetworkSKU = $FulfillmentNetworkSKU;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->Quantity;
    }

    /**
     * @param int $Quantity
     * @return InboundShipmentPlanItem
     */
    public function setQuantity(int $Quantity)
    {
        $this->Quantity = $Quantity;

        return $this;
    }

    /**
     * @return array
     */
    public function getPrepDetailsList()
    {
        return $this->PrepDetailsList;
    }

    /**
     * @param array $PrepDetailsList
     * @return InboundShipmentPlanItem
     */
    public function setPrepDetailsList(array $PrepDetailsList)
    {
        $this->PrepDetailsList = $PrepDetailsList;
        
        return $this;
    }
}
