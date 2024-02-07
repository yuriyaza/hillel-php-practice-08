<?php

namespace App\Models\Repositories;

use Illuminate\Support\Facades\DB;

class LinksRepository implements LinksRepositoryInterface
{
    public function getUrlsCountByUrl($url)
    {
        $count = DB::table('links')
            ->where('url', '=', $url)
            ->count('id');

        return $count;
    }

    public function getUrlById($id)
    {
        $data = DB::table('links')
            ->find($id);

        return $data->url;
    }

    public function insertUrlAndGetId($url)
    {
        $id = DB::table('links')
            ->insertGetId(['url' => $url]);

        return $id;
    }
}
