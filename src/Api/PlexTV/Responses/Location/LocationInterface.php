<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\Location;

interface LocationInterface
{
    public function getCode(): ?string;
    public function isEuropeanUnionMember(): ?bool;
    public function getContinentCode(): ?string;
    public function getCountry(): ?string;
    public function getCity(): ?string;
    public function getTimeZone(): ?string;
    public function getPostalCode(): ?string;
    public function isInPrivacyRestrictedCountry(): ?bool;
    public function isInPrivacyRestrictedRegion(): ?bool;
    public function getSubdivisions(): ?string;
    public function getCoordinates(): ?string;
}
