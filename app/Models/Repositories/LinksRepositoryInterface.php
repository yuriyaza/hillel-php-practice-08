<?php

namespace App\Models\Repositories;

interface LinksRepositoryInterface
{
    public function getUrlsCountByUrl($url);
    public function getUrlById($id);
    public function insertUrlAndGetId($url);
}
