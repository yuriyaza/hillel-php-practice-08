<?php

namespace App\Http\Controllers;

use App\Models\Repositories\LinksRepositoryInterface;
use App\Services\EncodeInterface;
use Illuminate\Support\Facades\Redirect;

class UrlRestoreController
{
    public function index($shortUrl, LinksRepositoryInterface $links, EncodeInterface $encoder)
    {
        $originalUrlId = $encoder->getIdByShortUrl($shortUrl);

        $originalUrl = $links->getUrlById($originalUrlId);

        if (!str_starts_with($originalUrl, 'http')) {
            $originalUrl = 'http://' . $originalUrl;
        }

        dump($originalUrl);
        dump(app());
//        return Redirect::to($originalUrl);
    }
}
