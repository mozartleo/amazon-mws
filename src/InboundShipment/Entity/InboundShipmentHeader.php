<?php

namespace WebPapers\Amazon\InboundShipment\Entity;

use WebPapers\Amazon\Common\Serializer\MetadataInterface;

final class InboundShipmentHeader implements MetadataInterface
{
    /**
     * @var string
     */
    public $ShipmentName;

    /**
     * @var Address
     */
    public $ShipFromAddress;

    /**
     * @var string
     */
    public $DestinationFulfillmentCenterId;

    /**
     * @var string
     */
    public $LabelPrepPreference;

    /**
     * @var bool
     */
    public $AreCasesRequired;

    /**
     * @var string
     */
    public $ShipmentStatus;

    /**
     * @var IntendedBoxContentsSource
     */
    public $IntendedBoxContentsSource;

    /**
     * {@inheritDoc}
     */
    public function getMetadata()
    {
        return [
            'ShipmentName'                   => ['type' => 'scalar'],
            'ShipFromAddress'                => ['type' => 'object', 'subtype' => Address::class],
            'DestinationFulfillmentCenterId' => ['type' => 'scalar'],
            'LabelPrepPreference'            => ['type' => 'choice', 'choices' => [
                'SELLER_LABEL',
                'AMAZON_LABEL_ONLY',
                'AMAZON_LABEL_PREFERRED',
            ]],
            'AreCasesRequired'               => ['type' => 'boolean'],
            'ShipmentStatus'                 => ['type' => 'choice', 'choices' => [
                'WORKING',
                'SHIPPED',
                'CANCELLED',
            ]],
            'IntendedBoxContentsSource'      => ['type' => 'choice', 'choices' => [
                'NONE',
                'FEED',
                '2D_BARCODE',
            ]],
        ];
    }

    /**
     * @return string
     */
    public function getShipmentName()
    {
        return $this->ShipmentName;
    }

    /**
     * @param string $ShipmentName
     * @return InboundShipmentHeader
     */
    public function setShipmentName(string $ShipmentName)
    {
        $this->ShipmentName = $ShipmentName;

        return $this;
    }

    /**
     * @return Address
     */
    public function getShipFromAddress()
    {
        return $this->ShipFromAddress;
    }

    /**
     * @param Address $ShipFromAddress
     * @return InboundShipmentHeader
     */
    public function setShipFromAddress(Address $ShipFromAddress)
    {
        $this->ShipFromAddress = $ShipFromAddress;

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
     * @return InboundShipmentHeader
     */
    public function setDestinationFulfillmentCenterId(string $DestinationFulfillmentCenterId)
    {
        $this->DestinationFulfillmentCenterId = $DestinationFulfillmentCenterId;

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
     * @return InboundShipmentHeader
     */
    public function setLabelPrepPreference(string $LabelPrepPreference)
    {
        $this->LabelPrepPreference = $LabelPrepPreference;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAreCasesRequired()
    {
        return $this->AreCasesRequired;
    }

    /**
     * @param bool $AreCasesRequired
     * @return InboundShipmentHeader
     */
    public function setAreCasesRequired(bool $AreCasesRequired)
    {
        $this->AreCasesRequired = $AreCasesRequired;

        return $this;
    }

    /**
     * @return string
     */
    public function getShipmentStatus()
    {
        return $this->ShipmentStatus;
    }

    /**
     * @param string $ShipmentStatus
     * @return InboundShipmentHeader
     */
    public function setShipmentStatus(string $ShipmentStatus)
    {
        $this->ShipmentStatus = $ShipmentStatus;

        return $this;
    }
    
    /**
     * @return IntendedBoxContentsSource
     */
    public function getIntendedBoxContentsSource()
    {
        return $this->IntendedBoxContentsSource;
    }

    /**
     * @param $IntendedBoxContentsSource
     * @return InboundShipmentHeader
     */
    public function setIntendedBoxContentsSource($IntendedBoxContentsSource)
    {
        $this->IntendedBoxContentsSource = $IntendedBoxContentsSource;

        return $this;
    }
}
