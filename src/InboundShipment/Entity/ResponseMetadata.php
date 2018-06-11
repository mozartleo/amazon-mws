<?php

namespace WebPapers\Amazon\InboundShipment\Entity;

/**
 * Meta-data returned with the response object.
 */
final class ResponseMetadata
{
    /**
     * @var string
     */
    public $RequestId;

    /**
     * @return string
     */
    public function getRequestId()
    {
        return $this->RequestId;
    }

    /**
     * @param string $RequestId
     * @return ResponseMetadata
     */
    public function setRequestId(string $RequestId): ResponseMetadata
    {
        $this->RequestId = $RequestId;

        return $this;
    }
}
