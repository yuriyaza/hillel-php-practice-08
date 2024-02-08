<?php

namespace App\Models\Repositories;

use Illuminate\Support\Facades\DB;

class UrlRepository implements UrlRepositoryInterface
{
    public function getUrlsCountByUrl($url)
    {
        try {
            $count = DB::table('urls')
                ->where('url', '=', $url)
                ->count('id');

            return $count;

        } catch (\Exception) {
            throw new UrlRepositoryException();
        }
    }

    public function getUrlById($id)
    {
        try {
            $data = DB::table('urls')
                ->find($id);

            return $data->url;

        } catch (\Exception) {
            throw new UrlRepositoryException();
        }
    }

    public function insertUrlAndGetId($url)
    {
        try {
            $id = DB::table('urls')
                ->insertGetId(['url' => $url]);

            return $id;

        } catch (\Exception) {
            throw new UrlRepositoryException();
        }
    }
}
