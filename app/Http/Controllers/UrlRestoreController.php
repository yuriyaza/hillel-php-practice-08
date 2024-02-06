<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UrlRestoreController
{
    public function index($url)
    {
        $id = base_convert($url, 36, 10);
        $savedUrl = DB::table('urls')
            ->find($id);


        $redirectUrl = $savedUrl->url;
        if (!str_starts_with($redirectUrl, 'http://')) {
            $redirectUrl = 'http://' . $redirectUrl;
        }

        return Redirect::to($redirectUrl);
    }
}
