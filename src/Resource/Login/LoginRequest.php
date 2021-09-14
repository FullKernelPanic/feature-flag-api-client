<?php

namespace FeatureFlagApiClient\Resource\Login;

use HttpApiClient\Request;
use GuzzleHttp\Psr7\Uri;

class LoginRequest extends Request
{
    public function __construct(string $userName, string $password)
    {
        parent::__construct(
            'POST',
            new Uri('login'),
            ['Content-Type' => 'application/json'],
            json_encode(['email' => $userName, 'password' => $password])
        );
    }
}