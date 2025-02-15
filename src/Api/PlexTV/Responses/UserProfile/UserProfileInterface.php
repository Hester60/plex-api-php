<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\UserProfile;

interface UserProfileInterface
{
    public function getAutoSelectAudio(): ?bool;
    public function getDefaultAudioAccessibility(): ?int;
    public function getDefaultAudioLanguage(): ?string;

    /**
     * @return array<string>|null
     */
    public function getDefaultAudioLanguages(): ?array;
    public function getDefaultSubtitleLanguage(): ?string;
    /**
     * @return array<string>|null
     */
    public function getDefaultSubtitleLanguages(): ?array;
    public function getAutoSelectSubtitle(): ?int;
    public function getDefaultSubtitleAccessibility(): ?int;
    public function getDefaultSubtitleForced(): ?int;
    public function getWatchedIndicator(): ?int;
    public function getMediaReviewsVisibility(): ?int;
    /**
     * @return array<string>|null
     */
    public function getMediaReviewsLanguages(): ?array;
}
