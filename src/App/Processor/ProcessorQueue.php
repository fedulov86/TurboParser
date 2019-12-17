<?php

namespace App\Processor;

class ProcessorQueue implements TextProcessorInterface
{
    private $queue = [];

    public function addProcessor(TextProcessorInterface $processor)
    {
        $this->queue[] = $processor;
    }

    public function process(string $text): string
    {
        /** @var TextProcessorInterface $processor */
        foreach ($this->queue as $processor) {
            $text = $processor->process($text);
        }

        return $text;
    }
}