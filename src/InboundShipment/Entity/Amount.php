<?php

namespace WebPapers\Amazon\InboundShipment\Entity;

use WebPapers\Amazon\Common\Serializer\MetadataInterface;

/**
 * The currency code and value.
 */
final class Amount implements MetadataInterface
{
    /**
     * @var string
     */
    public $CurrencyCode;

    /**
     * @var string
     */
    public $Value;

    /**
     * {@inheritDoc}
     */
    public function getMetadata()
    {
        return [
            'CurrencyCode' => ['type' => 'scalar'],
            'Value'        => ['type' => 'scalar'],
        ];
    }
}
