<?php

namespace App\Http\Controllers;

use App\Models\Repositories\LinksRepositoryInterface;
use App\Services\EncodeInterface;
use Illuminate\Http\Request;

class UrlMinimizeController
{
    public function index(Request $request, LinksRepositoryInterface $links, EncodeInterface $encoder)
    {
        $originalUrl = $request->get('url');
        if (!$originalUrl) {
            throw new \Exception('URL is not defined');
        }

        $originalUrlsCount = $links->getUrlsCountByUrl($originalUrl);
        if ($originalUrlsCount > 0) {
            throw new \Exception('URL is already exist');
        }

        $originalUrlId = $links->insertUrlAndGetId($originalUrl);

        $result = $encoder->getShortUrlById($originalUrlId);
        dump($result);
    }


}
