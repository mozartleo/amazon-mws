<?php

namespace WebPapers\Amazon\Credentials;

interface CredentialsAwareInterface
{
    public function getCredentials();

    public function setCredentials(CredentialsInterface $credentials);
}