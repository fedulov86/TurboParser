<?php

interface TextProcessorInterface
{
    public function process(string $text): string;
}