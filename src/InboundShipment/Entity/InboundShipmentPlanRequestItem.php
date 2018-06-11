<?php

namespace WebPapers\Amazon\InboundShipment\Entity;

use WebPapers\Amazon\Common\Serializer\MetadataInterface;

final class InboundShipmentPlanRequestItem implements MetadataInterface
{
    /** @var string */
    public $SellerSKU;

    /** @var string */
    public $ASIN;

    /** @var string */
    public $Condition;

    /** @var int */
    public $Quantity;

    /** @var int */
    public $QuantityInCase;

    /** @var array */
    public $PrepDetailsList;

    /**
     * {@inheritDoc}
     */
    public function getMetadata()
    {
        return [
            'SellerSKU'         => ['type' => 'scalar'],
            'ASIN'              => ['type' => 'scalar'],
            'Condition'         => ['type' => 'choice', 'choices' => [
                'NewItem',
                'NewWithWarranty',
                'NewOEM',
                'NewOpenBox',
                'UsedLikeNew',
                'UsedVeryGood',
                'UsedGood',
                'UsedAcceptable',
                'UsedPoor',
                'UsedRefurbished',
                'CollectibleLikeNew',
                'CollectibleVeryGood',
                'CollectibleGood',
                'CollectibleAcceptable',
                'CollectiblePoor',
                'RefurbishedWithWarranty',
                'Refurbished',
                'Club',
            ]],
            'Quantity'          => ['type' => 'scalar'],
            'QuantityInCase'    => ['type' => 'scalar'],
            'PrepDetailsList'   => ['type' => 'array', 'subtype' => PrepDetails::class, 'namespace' => 'member'],
        ];
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
     * @return InboundShipmentPlanRequestItem
     */
    public function setSellerSKU(string $SellerSKU): InboundShipmentPlanRequestItem
    {
        $this->SellerSKU = $SellerSKU;

        return $this;
    }

    /**
     * @return string
     */
    public function getASIN()
    {
        return $this->ASIN;
    }

    /**
     * @param string $ASIN
     * @return InboundShipmentPlanRequestItem
     */
    public function setASIN(string $ASIN): InboundShipmentPlanRequestItem
    {
        $this->ASIN = $ASIN;

        return $this;
    }

    /**
     * @return string
     */
    public function getCondition()
    {
        return $this->Condition;
    }

    /**
     * @param string $Condition
     * @return InboundShipmentPlanRequestItem
     */
    public function setCondition(string $Condition): InboundShipmentPlanRequestItem
    {
        $this->Condition = $Condition;

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
     * @return InboundShipmentPlanRequestItem
     */
    public function setQuantity(int $Quantity): InboundShipmentPlanRequestItem
    {
        $this->Quantity = $Quantity;

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
     * @return InboundShipmentPlanRequestItem
     */
    public function setQuantityInCase(int $QuantityInCase): InboundShipmentPlanRequestItem
    {
        $this->QuantityInCase = $QuantityInCase;

        return $this;
    }

    /**
     * @return array
     */
    public function getPrepDetailsList(): array
    {
        return $this->PrepDetailsList;
    }

    /**
     * @param array $PrepDetailsList
     * @return InboundShipmentPlanRequestItem
     */
    public function setPrepDetailsList(array $PrepDetailsList): InboundShipmentPlanRequestItem
    {
        $this->PrepDetailsList = $PrepDetailsList;

        return $this;
    }

}
