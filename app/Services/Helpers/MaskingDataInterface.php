<?php

namespace App\Services\Helpers;

interface MaskingDataInterface
{
    public function mask($data);
    public function unMask($data);
}
