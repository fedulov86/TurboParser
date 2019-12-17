<?php

namespace App\Processor;

class ToNumberProcessor implements TextProcessorInterface
{

    public function process(string $text): string
    {
        return preg_replace('/\D/', '', $text);
    }
}