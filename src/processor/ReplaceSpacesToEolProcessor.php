<?php

class ReplaceSpacesToEolProcessor implements TextProcessorInterface
{

    public function process(string $text): string
    {
        return str_replace(' ', PHP_EOL, $text);
    }
}