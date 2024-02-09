<?php

namespace App\Services;

use App\Models\Repositories\UrlRepositoryInterface;
use App\Services\Helpers\MaskingDataInterface;


class UrlEncoder implements UrlEncoderInterface
{
    protected const INITIAL_DATA = 10000000;

    protected UrlRepositoryInterface $urlRepository;
    protected MaskingDataInterface $maskingData;

    public function __construct(UrlRepositoryInterface $urlRepository, MaskingDataInterface $maskingData)
    {
        $this->urlRepository = $urlRepository;
        $this->maskingData = $maskingData;
    }

    public function convertToShortUrl(string $hostName, string $originalUrl): string
    {
        $id = $this->urlRepository->insertUrlAndGetId($originalUrl);
        $urlData = self::INITIAL_DATA + $id;
        $shortUrl = base_convert($urlData, 10, 36);
        $maskedShortUrl = $this->maskingData->mask($shortUrl);

        return 'http://' . $hostName . '/' . $maskedShortUrl;
    }

    public function convertToOriginalUrl(string $shortUrl): string
    {
        $unmaskedShortUrl = $this->maskingData->unMask($shortUrl);
        $urlData = base_convert($unmaskedShortUrl, 36, 10);
        $id = $urlData - self::INITIAL_DATA;
        $originalUrl = $this->urlRepository->getUrlById($id);

        if (!str_starts_with($originalUrl, 'http')) {
            $originalUrl = 'http://' . $originalUrl;
        }

        return $originalUrl;
    }
}
