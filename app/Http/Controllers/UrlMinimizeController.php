<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrlMinimizeController
{
    public function index(Request $request)
    {
        $originalUrl = $request->get('url');
        if (!$originalUrl) {
            throw new \Exception('URL is not defined');
        }

        $existingUrls = DB::table('urls')
            ->select('url')
            ->where('url', '=', $originalUrl)
            ->get();
        if ($existingUrls->count() > 0) {
            throw new \Exception('URL is already exist');
        }

        $createdId = DB::table('urls')
            ->insertGetId(['url' => $originalUrl]);

        $result = base_convert($createdId, 10, 36);
        dump($result);
    }
}
