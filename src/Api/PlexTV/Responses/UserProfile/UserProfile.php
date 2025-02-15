<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\UserProfile;

class UserProfile implements UserProfileInterface
{
    private ?bool $autoSelectAudio;
    private ?int $defaultAudioAccessibility;
    private ?string $defaultAudioLanguage;
    /**
     * @var array<string>|null
     */
    private ?array $defaultAudioLanguages;
    private ?string $defaultSubtitleLanguage;
    /**
     * @var array<string>|null
     */
    private ?array $defaultSubtitleLanguages;
    private ?int $autoSelectSubtitle;
    private ?int $defaultSubtitleAccessibility;
    private ?int $defaultSubtitleForced;
    private ?int $watchedIndicator;
    private ?int $mediaReviewsVisibility;
    /**
     * @var array<string>|null
     */
    private ?array $mediaReviewsLanguages;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        $this->autoSelectAudio = $data['autoSelectAudio'] ?? null;
        $this->defaultAudioAccessibility = $data['defaultAudioAccessibility'] ?? null;
        $this->defaultAudioLanguage = $data['defaultAudioLanguage'] ?? null;
        $this->defaultAudioLanguages = $data['defaultAudioLanguages'] ?? null;
        $this->defaultSubtitleLanguage = $data['defaultSubtitleLanguage'] ?? null;
        $this->defaultSubtitleLanguages = $data['defaultSubtitleLanguages'] ?? null;
        $this->autoSelectSubtitle = $data['autoSelectSubtitle'] ?? null;
        $this->defaultSubtitleAccessibility = $data['defaultSubtitleAccessibility'] ?? null;
        $this->defaultSubtitleForced = $data['defaultSubtitleForced'] ?? null;
        $this->watchedIndicator = $data['watchedIndicator'] ?? null;
        $this->mediaReviewsVisibility = $data['mediaReviewsVisibility'] ?? null;
        $this->mediaReviewsLanguages = $data['mediaReviewsLanguages'] ?? null;
    }

    public function getAutoSelectAudio(): ?bool
    {
        return $this->autoSelectAudio;
    }
    public function getDefaultAudioAccessibility(): ?int
    {
        return $this->defaultAudioAccessibility;
    }
    public function getDefaultAudioLanguage(): ?string
    {
        return $this->defaultAudioLanguage;
    }
    public function getDefaultAudioLanguages(): ?array
    {
        return $this->defaultAudioLanguages;
    }
    public function getDefaultSubtitleLanguage(): ?string
    {
        return $this->defaultSubtitleLanguage;
    }
    public function getDefaultSubtitleLanguages(): ?array
    {
        return $this->defaultSubtitleLanguages;
    }
    public function getAutoSelectSubtitle(): ?int
    {
        return $this->autoSelectSubtitle;
    }
    public function getDefaultSubtitleAccessibility(): ?int
    {
        return $this->defaultSubtitleAccessibility;
    }
    public function getDefaultSubtitleForced(): ?int
    {
        return $this->defaultSubtitleForced;
    }
    public function getWatchedIndicator(): ?int
    {
        return $this->watchedIndicator;
    }
    public function getMediaReviewsVisibility(): ?int
    {
        return $this->mediaReviewsVisibility;
    }
    public function getMediaReviewsLanguages(): ?array
    {
        return $this->mediaReviewsLanguages;
    }
}
