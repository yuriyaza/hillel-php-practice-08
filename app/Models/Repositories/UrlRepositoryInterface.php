<?php

namespace App\Models\Repositories;

interface UrlRepositoryInterface
{
    public function getUrlsCountByUrl($url);
    public function getUrlById($id);
    public function insertUrlAndGetId($url);
}
