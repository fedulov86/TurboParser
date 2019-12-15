<?php


class StripTagsProcessor implements TextProcessorInterface
{

    public function process(string $text): string
    {
        return strip_tags($text);
    }
}