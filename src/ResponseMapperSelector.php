<?php

namespace FeatureFlagApiClient;

use ApiClientBase\RequestInterface;
use ApiClientBase\ResponseInterface;
use HttpApiClient\ResponseMapperSelectorInterface;
use ApiClientBase\UnsupportedResponseType;

class ResponseMapperSelector implements ResponseMapperSelectorInterface
{
    /**
     * @var array<string, ResponseMapperInterface>
     */
    private array $responseMapperByRequestClassNames;

    /**
     * @param array<string, ResponseMapperInterface> $responseMapperByRequestClassNames
     */
    public function __construct(array $responseMapperByRequestClassNames)
    {
        $this->responseMapperByRequestClassNames = $responseMapperByRequestClassNames;
    }

    /**
     * @throws UnsupportedResponseType
     */
    public function mapResponse(
        RequestInterface $request,
        \Psr\Http\Message\ResponseInterface $response
    ): ResponseInterface {
        $requestClass = get_class($request);

        if (isset($this->responseMapperByRequestClassNames[$requestClass])) {
            return $this->responseMapperByRequestClassNames[$requestClass]->mapResponse($response);
        }

        throw new UnsupportedResponseType(get_class($request));
    }
}