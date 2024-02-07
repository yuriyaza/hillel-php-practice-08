<?php

namespace App\Services;

class Encode implements EncodeInterface
{
    protected TransformInterface $transform;

    public function __construct(TransformInterface $transform)
    {
        $this->transform = $transform;
    }

        public function getShortUrlById($id)
    {
        $shortUrl = base_convert($id, 10, 36);
        $maskedShortUrl = $this->transform->mask()->execute($shortUrl);
        return $maskedShortUrl;
    }

    public function getIdByShortUrl($shortUrl)
    {
        $unmaskedShortUrl = $this->transform->unMask()->execute($shortUrl);
        $id = base_convert($unmaskedShortUrl, 36, 10);
        return $id;
    }
}
