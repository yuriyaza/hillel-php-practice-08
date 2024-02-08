<?php

namespace App\Services;

use App\Services\Helpers\MaskingDataInterface;

class UrlEncoder implements UrlEncoderInterface
{
    protected MaskingDataInterface $maskingData;

    public function __construct(MaskingDataInterface $maskingData)
    {
        $this->maskingData = $maskingData;
    }

    public function convertIdToShortUrl($hostName, $id)
    {
        $shortUrl = base_convert($id, 10, 36);
        $maskedShortUrl = $this->maskingData->mask($shortUrl);

        return 'http://' . $hostName . '/' . $maskedShortUrl;
    }

    public function convertShortUrlToId($shortUrl)
    {
        $unmaskedShortUrl = $this->maskingData->unMask($shortUrl);
        $id = base_convert($unmaskedShortUrl, 36, 10);

        return $id;
    }
}
