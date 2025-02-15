<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\Location;

class Location implements LocationInterface
{
    private ?string $code;
    private ?bool $europeanUnionMember;
    private ?string $continentCode;
    private ?string $country;
    private ?string $city;
    private ?string $timeZone;
    private ?string $postalCode;
    private ?bool $inPrivacyRestrictedCountry;
    private ?bool $inPrivacyRestrictedRegion;
    private ?string $subdivisions;
    private ?string $coordinates;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        $this->code = $data['code'] ?? null;
        $this->europeanUnionMember = $data['european_union_member'] ?? null;
        $this->continentCode = $data['continent_code'] ?? null;
        $this->country = $data['country'] ?? null;
        $this->city = $data['city'] ?? null;
        $this->timeZone = $data['time_zone'] ?? null;
        $this->postalCode = $data['postal_code'] ?? null;
        $this->inPrivacyRestrictedCountry = $data['in_privacy_restricted_country'] ?? null;
        $this->inPrivacyRestrictedRegion = $data['in_privacy_restricted_region'] ?? null;
        $this->subdivisions = $data['subdivisions'] ?? null;
        $this->coordinates = $data['coordinates'] ?? null;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function isEuropeanUnionMember(): ?bool
    {
        return $this->europeanUnionMember;
    }

    public function getContinentCode(): ?string
    {
        return $this->continentCode;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getTimeZone(): ?string
    {
        return $this->timeZone;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function isInPrivacyRestrictedCountry(): ?bool
    {
        return $this->inPrivacyRestrictedCountry;
    }

    public function isInPrivacyRestrictedRegion(): ?bool
    {
        return $this->inPrivacyRestrictedRegion;
    }

    public function getSubdivisions(): ?string
    {
        return $this->subdivisions;
    }

    public function getCoordinates(): ?string
    {
        return $this->coordinates;
    }
}
