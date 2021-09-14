<?php

namespace FeatureFlagApiClient\Resource\Login;

use ApiClientBase\ResponseInterface;

class LoginResponse implements ResponseInterface
{
    private string $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function getToken(): string
    {
        return $this->token;
    }
}
