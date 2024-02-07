<?php

namespace App\Services;

interface TransformInterface
{
    public function mask();
    public function unMask();
    public function execute($text);
}
