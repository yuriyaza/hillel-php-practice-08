<?php

namespace App\Services;

interface EncodeInterface
{
    public function getShortUrlById($id);
    public function getIdByShortUrl($shortUrl);
}
