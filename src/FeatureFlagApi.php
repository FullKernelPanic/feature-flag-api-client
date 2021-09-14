<?php

namespace FeatureFlagApiClient;

use FeatureFlagApiClient\Resource\Login\LoginRequest;
use FeatureFlagApiClient\Resource\Login\LoginResponse;
use ApiClientBase\Client;

class FeatureFlagApi
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function login(string $email, string $password): string
    {
        /** @var LoginResponse $loginResponse */
        $loginResponse = $this->client->send(new LoginRequest($email, $password));

        return $loginResponse->getToken();
    }
}