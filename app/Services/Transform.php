<?php

namespace App\Services;

class Transform implements TransformInterface
{
    protected $dictionary = '0123456789abcdefghijklmnopqrstuvwxyz';
    protected $mask = '5pbrmwi9ql28ocn16zf4t7hajxy0kdsvueg3';

    protected $from;
    protected $to;

    public function mask()
    {
        $this->from = $this->dictionary;
        $this->to = $this->mask;

        return $this;
    }

    public function unMask()
    {
        $this->from = $this->mask;
        $this->to = $this->dictionary;

        return $this;
    }

    public function execute($text)
    {
        $sourceText = str_split($text);
        $fromDictionary = str_split($this->from);
        $toDictionary = str_split($this->to);

        $transformedText = array_map(
            function ($item) use ($fromDictionary, $toDictionary) {
                $index = array_search($item, $fromDictionary);
                return $toDictionary[$index];
            }, $sourceText);

        return implode($transformedText);
    }
}
