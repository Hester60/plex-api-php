<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\ServerLibrary;

class ServerLibrary implements ServerLibraryInterface
{
    private ?int $id;
    private ?int $key;
    private ?string $title;
    private ?string $type;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->key = $data['key'] ?? null;
        $this->title = $data['title'] ?? null;
        $this->type = $data['type'] ?? null;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKey(): ?int
    {
        return $this->key;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getType(): ?string
    {
        return $this->type;
    }
}
