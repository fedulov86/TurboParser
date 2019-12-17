<?php

namespace Tests;

use Zend\Diactoros\ServerRequest;
use PHPUnit\Framework\TestCase;
use App\Http\Action\TextProcessAction;

class TextProcessActionTest extends TestCase
{
    public function testText()
    {
        $request = new ServerRequest();
        $request = $request->withParsedBody([
                'job' => [
                    'text' => 'Привет, мне на <a href="test@test.ru">test@test.ru</a> пришло приглашение встретиться, попить кофе с <strong>10%</strong> содержанием молока за <i>$5</i>, пойдем вместе!',
                    'methods' => [
                        'stripTags',
                        'removeSpaces',
                        'replaceSpacesToEol',
                        'htmlspecialchars',
                        'removeSymbols',
                        'toNumber',
                    ],
                ],
            ]
        );
        $action = new TextProcessAction();
        $response = $action($request);

        $body = json_decode((string)$response->getBody(), true);

        self::assertEquals($body['text'], '105');
    }
}