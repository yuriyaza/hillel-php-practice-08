<?php

namespace App\Services\Helpers;

class ShiftArray implements ShiftArrayInterface
{
    public function execute(array $array, string $shift): array
    {
        $offset = (int)$shift % count($array);
        $splice = array_splice($array, $offset);

        return array_merge($splice, $array);
    }
}
