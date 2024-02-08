<?php

namespace App\Services;

interface UrlEncoderInterface
{
    public function convertIdToShortUrl($hostName, $id);
    public function convertShortUrlToId($shortUrl);
}
