<?php

namespace WebPapers\Amazon\Common\Serializer;

use WebPapers\Amazon\Common\RequestInterface;

interface SerializerInterface
{
    function serialize(RequestInterface $request);

    function unserialize($response);
}