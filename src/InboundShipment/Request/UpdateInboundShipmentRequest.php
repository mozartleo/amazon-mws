<?php

namespace WebPapers\Amazon\InboundShipment\Request;

use WebPapers\Amazon\InboundShipment\Entity;
use WebPapers\Amazon\Common\RequestInterface;
use WebPapers\Amazon\InboundShipment\Entity\InboundShipmentHeader;
use WebPapers\Amazon\InboundShipment\Entity\InboundShipmentItem;

/**
 * Updates an existing inbound shipment.
 *
 * @see http://docs.developer.amazonservices.com/en_US/fba_inbound/FBAInbound_UpdateInboundShipment.html
 */
final class UpdateInboundShipmentRequest implements RequestInterface
{
    /**
     * @var string
     */
    public $ShipmentId;

    /**
     * @var InboundShipmentHeader
     */
    public $InboundShipmentHeader;

    /**
     * @var InboundShipmentItem[]
     */
    public $InboundShipmentItems;

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
     * @return null|string
     */
    public function getShipmentId(): ?string
    {
        return $this->ShipmentId;
    }

    /**
     * @param string $ShipmentId
     * @return UpdateInboundShipmentRequest
     */
    public function setShipmentId(string $ShipmentId): UpdateInboundShipmentRequest
    {
        $this->ShipmentId = $ShipmentId;

        return $this;
    }

    /**
     * @return InboundShipmentHeader
     */
    public function getInboundShipmentHeader(): InboundShipmentHeader
    {
        return $this->InboundShipmentHeader;
    }

    /**
     * @param InboundShipmentHeader $InboundShipmentHeader
     * @return UpdateInboundShipmentRequest
     */
    public function setInboundShipmentHeader(InboundShipmentHeader $InboundShipmentHeader): UpdateInboundShipmentRequest
    {
        $this->InboundShipmentHeader = $InboundShipmentHeader;

        return $this;
    }

    /**
     * @return InboundShipmentItem[]
     */
    public function getInboundShipmentItems(): array
    {
        return $this->InboundShipmentItems;
    }

    /**
     * @param InboundShipmentItem[] $InboundShipmentItems
     * @return UpdateInboundShipmentRequest
     */
    public function setInboundShipmentItems(array $InboundShipmentItems): UpdateInboundShipmentRequest
    {
        $this->InboundShipmentItems = $InboundShipmentItems;

        return $this;
    }
}
