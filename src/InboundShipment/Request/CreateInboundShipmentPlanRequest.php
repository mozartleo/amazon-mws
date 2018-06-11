<?php

namespace WebPapers\Amazon\InboundShipment\Request;

use WebPapers\Amazon\Common\RequestInterface;
use WebPapers\Amazon\InboundShipment\Entity;

final class CreateInboundShipmentPlanRequest implements RequestInterface
{
    /** @var Entity\Address */
    public $ShipFromAddress;

    /** @var string */
    public $ShipToCountryCode;

    /** @var string */
    public $ShipToCountrySubdivisionCode;

    /** @var string */
    public $LabelPrepPreference;

    /** @var array */
    public $InboundShipmentPlanRequestItems;

    /**
     * {@inheritDoc}
     */
    public function getMetadata()
    {
        return [
            'ShipFromAddress'                 => ['type' => 'object', 'subtype' => Entity\Address::class],
            'ShipToCountryCode'               => ['type' => 'scalar'],
            'ShipToCountrySubdivisionCode'    => ['type' => 'scalar'],
            'LabelPrepPreference'             => ['type' => 'choice', 'choices' => [
                'SELLER_LABEL',
                'AMAZON_LABEL_ONLY',
                'AMAZON_LABEL_PREFERRED',
            ]],
            'InboundShipmentPlanRequestItems' => [
                'type'      => 'array',
                'subtype'   => Entity\InboundShipmentPlanRequestItem::class,
                'namespace' => 'member',
            ],
        ];
    }

    public function __construct()
    {
        $this->InboundShipmentPlanRequestItems = [];
    }

    /**
     * @return Entity\Address
     */
    public function getShipFromAddress()
    {
        return $this->ShipFromAddress;
    }

    /**
     * @param Entity\Address $ShipFromAddress
     * @return CreateInboundShipmentPlanRequest
     */
    public function setShipFromAddress(Entity\Address $ShipFromAddress): CreateInboundShipmentPlanRequest
    {
        $this->ShipFromAddress = $ShipFromAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getShipToCountryCode()
    {
        return $this->ShipToCountryCode;
    }

    /**
     * @param string $ShipToCountryCode
     * @return CreateInboundShipmentPlanRequest
     */
    public function setShipToCountryCode(string $ShipToCountryCode): CreateInboundShipmentPlanRequest
    {
        $this->ShipToCountryCode = $ShipToCountryCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getShipToCountrySubdivisionCode()
    {
        return $this->ShipToCountrySubdivisionCode;
    }

    /**
     * @param string $ShipToCountrySubdivisionCode
     * @return CreateInboundShipmentPlanRequest
     */
    public function setShipToCountrySubdivisionCode(string $ShipToCountrySubdivisionCode): CreateInboundShipmentPlanRequest
    {
        $this->ShipToCountrySubdivisionCode = $ShipToCountrySubdivisionCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabelPrepPreference()
    {
        return $this->LabelPrepPreference;
    }

    /**
     * @param string $LabelPrepPreference
     * @return CreateInboundShipmentPlanRequest
     */
    public function setLabelPrepPreference(string $LabelPrepPreference): CreateInboundShipmentPlanRequest
    {
        $this->LabelPrepPreference = $LabelPrepPreference;

        return $this;
    }

    /**
     * @return array
     */
    public function getInboundShipmentPlanRequestItems(): array
    {
        return $this->InboundShipmentPlanRequestItems;
    }

    /**
     * @param array $InboundShipmentPlanRequestItems
     * @return CreateInboundShipmentPlanRequest
     */
    public function setInboundShipmentPlanRequestItems(array $InboundShipmentPlanRequestItems): CreateInboundShipmentPlanRequest
    {
        $this->InboundShipmentPlanRequestItems = $InboundShipmentPlanRequestItems;

        return $this;
    }

    /**
     * @param Entity\InboundShipmentPlanRequestItem $item
     * @return CreateInboundShipmentPlanRequest
     */
    public function addInboundShipmentPlanRequestItem(Entity\InboundShipmentPlanRequestItem $item): CreateInboundShipmentPlanRequest
    {
        $this->InboundShipmentPlanRequestItems[] = $item;

        return $this;
    }
}