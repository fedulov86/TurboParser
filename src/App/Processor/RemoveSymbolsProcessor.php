<?php

namespace App\Processor;

class RemoveSymbolsProcessor implements TextProcessorInterface
{

    public function process(string $text): string
    {
        return preg_replace('/[.,\/!@#$%^&*()]/', '', $text);
    }
}