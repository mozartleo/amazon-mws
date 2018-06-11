<?php

namespace WebPapers\Amazon\InboundShipment\Request;

use WebPapers\Amazon\Common\RequestInterface;
use WebPapers\Amazon\InboundShipment\Entity;

final class CreateInboundShipmentRequest implements RequestInterface
{
    /**
     * @var string
     */
    public $ShipmentId;

    /**
     * @var Entity\InboundShipmentHeader
     */
    public $InboundShipmentHeader;

    /**
     * @var array
     */
    public $InboundShipmentItems;

    public function __construct()
    {
        $this->InboundShipmentItems = [];
    }

    /**
     * {@inheritDoc}
     */
    public function getMetadata()
    {
        return [
            'ShipmentId'            => ['type' => 'scalar'],
            'InboundShipmentHeader' => ['type' => 'object', 'subtype' => Entity\InboundShipmentHeader::class],
            'InboundShipmentItems'  => [
                'type'      => 'array',
                'subtype'   => Entity\InboundShipmentItem::class,
                'namespace' => 'member',
            ],
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
     * @return CreateInboundShipmentRequest
     */
    public function setShipmentId(string $ShipmentId)
    {
        $this->ShipmentId = $ShipmentId;

        return $this;
    }

    /**
     * @return Entity\InboundShipmentHeader
     */
    public function getInboundShipmentHeader()
    {
        return $this->InboundShipmentHeader;
    }

    /**
     * @param Entity\InboundShipmentHeader $InboundShipmentHeader
     * @return CreateInboundShipmentRequest
     */
    public function setInboundShipmentHeader(Entity\InboundShipmentHeader $InboundShipmentHeader)
    {
        $this->InboundShipmentHeader = $InboundShipmentHeader;

        return $this;
    }

    /**
     * @return array
     */
    public function getInboundShipmentItems()
    {
        return $this->InboundShipmentItems;
    }

    /**
     * @param array $InboundShipmentItems
     * @return CreateInboundShipmentRequest
     */
    public function setInboundShipmentItems(array $InboundShipmentItems)
    {
        $this->InboundShipmentItems = $InboundShipmentItems;

        return $this;
    }
}
