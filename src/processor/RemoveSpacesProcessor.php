<?php

class RemoveSpacesProcessor implements TextProcessorInterface
{

    public function process(string $text): string
    {
        return str_replace(' ', '', $text);
    }
}