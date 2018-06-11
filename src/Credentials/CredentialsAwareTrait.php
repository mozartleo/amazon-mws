<?php
/**
 * Created by PhpStorm.
 * User: Artem Morozov
 * Date: 01.06.18
 * Time: 11:39
 */

namespace WebPapers\Amazon\Credentials;


trait CredentialsAwareTrait
{
    /** @var CredentialsInterface */
    private $credentials;

    public function getCredentials(): CredentialsInterface
    {
        return $this->credentials;
    }

    public function setCredentials(CredentialsInterface $credentials)
    {
        $this->credentials = $credentials;

        return $this;
    }
}