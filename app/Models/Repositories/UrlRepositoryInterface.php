<?php

namespace App\Models\Repositories;

interface UrlRepositoryInterface
{
    public function getUrlsCountByUrl(string $url): int;

    public function getUrlById(int $id): string;

    public function insertUrlAndGetId(string $url): int;
}
