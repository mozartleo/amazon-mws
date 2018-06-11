<?php

namespace WebPapers\Amazon\InboundShipment\Entity;

use WebPapers\Amazon\Common\Serializer\MetadataInterface;

final class InboundShipmentItem implements MetadataInterface
{
    /**
     * @var string
     */
    public $ShipmentId;

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
    public $QuantityShipped;

    /**
     * @var int
     */
    public $QuantityReceived;

    /**
     * @var int
     */
    public $QuantityInCase;

    /**
     * @var array
     */
    public $PrepDetailsList;

    /**
     * @var string
     */
    public $ReleaseDate;

    /**
     * {@inheritDoc}
     */
    public function getMetadata()
    {
        return [
            'ShipmentId'            => ['type' => 'scalar'],
            'SellerSKU'             => ['type' => 'scalar'],
            'FulfillmentNetworkSKU' => ['type' => 'scalar'],
            'QuantityShipped'       => ['type' => 'scalar'],
            'QuantityReceived'      => ['type' => 'scalar'],
            'QuantityInCase'        => ['type' => 'scalar'],
            'PrepDetailsList'       => ['type' => 'array', 'subtype' => PrepDetails::class, 'namespace' => 'member'],
            'ReleaseDate'           => ['type' => 'datetime'],
        ];
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
     * @return InboundShipmentItem
     */
    public function setShipmentId(string $ShipmentId)
    {
        $this->ShipmentId = $ShipmentId;

        return $this;
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
     * @return InboundShipmentItem
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
     * @return InboundShipmentItem
     */
    public function setFulfillmentNetworkSKU(string $FulfillmentNetworkSKU)
    {
        $this->FulfillmentNetworkSKU = $FulfillmentNetworkSKU;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantityShipped()
    {
        return $this->QuantityShipped;
    }

    /**
     * @param int $QuantityShipped
     * @return InboundShipmentItem
     */
    public function setQuantityShipped(int $QuantityShipped)
    {
        $this->QuantityShipped = $QuantityShipped;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantityReceived()
    {
        return $this->QuantityReceived;
    }

    /**
     * @param int $QuantityReceived
     * @return InboundShipmentItem
     */
    public function setQuantityReceived(int $QuantityReceived)
    {
        $this->QuantityReceived = $QuantityReceived;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantityInCase()
    {
        return $this->QuantityInCase;
    }

    /**
     * @param int $QuantityInCase
     * @return InboundShipmentItem
     */
    public function setQuantityInCase(int $QuantityInCase)
    {
        $this->QuantityInCase = $QuantityInCase;

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
     * @return InboundShipmentItem
     */
    public function setPrepDetailsList(array $PrepDetailsList)
    {
        $this->PrepDetailsList = $PrepDetailsList;

        return $this;
    }

    /**
     * @return string
     */
    public function getReleaseDate()
    {
        return $this->ReleaseDate;
    }

    /**
     * @param string $ReleaseDate
     * @return InboundShipmentItem
     */
    public function setReleaseDate(string $ReleaseDate)
    {
        $this->ReleaseDate = $ReleaseDate;

        return $this;
    }
}
