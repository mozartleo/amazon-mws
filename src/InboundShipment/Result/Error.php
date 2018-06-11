<?php

namespace WebPapers\Amazon\InboundShipment\Result;

use WebPapers\Amazon\Common\ResultInterface;

/**
 * Error message.
 */
final class Error implements ResultInterface
{
    /**
     * @var string
     */
    public $Type;

    /**
     * @var string
     */
    public $Code;

    /**
     * @var string
     */
    public $Message;
}
