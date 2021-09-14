<?php

namespace FeatureFlagApiClient\Resource\Login;

use FeatureFlagApiClient\ResponseMapperInterface;
use Psr\Http\Message\ResponseInterface;

class LoginResponseMapper implements ResponseMapperInterface
{
    public function mapResponse(ResponseInterface $response): \ApiClientBase\ResponseInterface
    {
        return new LoginResponse($response->getHeader('X-Token')[0]);
    }
}