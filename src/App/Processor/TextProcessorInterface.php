<?php

namespace App\Processor;

interface TextProcessorInterface
{
    public function process(string $text): string;
}