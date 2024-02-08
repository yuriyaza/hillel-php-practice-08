<?php

namespace App\Services\Helpers;

class ShiftArray implements ShiftArrayInterface
{
    public function execute($array, $shift)
    {
        $offset = $shift % count($array);
        $splice = array_splice($array, $offset);
        $merged = array_merge($splice, $array);

        return $merged;
    }
}
