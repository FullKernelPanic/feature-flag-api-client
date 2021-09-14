<?php

namespace FeatureFlagApiClient;

use Psr\Http\Message\ResponseInterface;

interface ResponseMapperInterface
{
    public function mapResponse(ResponseInterface $response): \ApiClientBase\ResponseInterface;
}