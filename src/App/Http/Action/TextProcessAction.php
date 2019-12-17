<?php

namespace App\Http\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use App\Processor;

class TextProcessAction
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $body = $request->getParsedBody();

        $text = $body['job']['text'];
        $methods = $body['job']['methods'];

        $queue = new Processor\ProcessorQueue();
        foreach ($methods as $method) {
            $className = 'App\\Processor\\' . ucfirst($method) . 'Processor';
            $processor = new $className();
            $queue->addProcessor($processor);
        }

        return new JsonResponse(['text' => $queue->process($text)]);
    }
}