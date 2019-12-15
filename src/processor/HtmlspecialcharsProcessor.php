<?php

class HtmlspecialcharsProcessor implements TextProcessorInterface
{

    public function process(string $text): string
    {
        return htmlspecialchars($text);
    }
}