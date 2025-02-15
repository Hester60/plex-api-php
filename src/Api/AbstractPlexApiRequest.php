<?php

namespace Hester60\PlexApiPhp\Api;

abstract class AbstractPlexApiRequest implements PlexApiRequestInterface
{
    protected const string METHOD = 'GET';
    protected const string ENDPOINT = '';

    protected string $baseUrl;

    public function __construct(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function getMethod(): string
    {
        return static::METHOD;
    }

    public function getUrl(): string
    {
        return $this->baseUrl . static::ENDPOINT;
    }

    abstract public function getParams(): array;

    abstract public function deserializeResponse(mixed $data): mixed;

    abstract public function throwException(int $statusCode, ?string $message = null): void;
}
