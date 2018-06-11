<?php

namespace WebPapers\Amazon\InboundShipment\Response;

use WebPapers\Amazon\Common\ResponseInterface;
use WebPapers\Amazon\InboundShipment\Result\Error;

/**
 * Returns error response.
 */
final class ErrorResponse implements ResponseInterface
{
    /**
     * @var Error
     */
    public $Error;

    /**
     * @var string
     */
    public $RequestID;

    /**
     * {@inheritDoc}
     */
    public function getResult()
    {
        return $this->Error;
    }
}
