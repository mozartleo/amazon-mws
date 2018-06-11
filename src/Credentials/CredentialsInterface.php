<?php

namespace WebPapers\Amazon\Credentials;

interface CredentialsInterface
{
    public function getSellerId(): ?string;

    public function getAWSAccessKeyId(): ?string;

    public function getSecretKey(): ?string;

    public function getMWSAuthToken(): ?string;
}