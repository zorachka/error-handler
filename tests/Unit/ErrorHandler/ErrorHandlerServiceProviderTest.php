<?php

declare(strict_types=1);

use Whoops\RunInterface;
use Zorachka\Framework\ErrorHandler\ErrorHandler;
use Zorachka\Framework\ErrorHandler\ErrorHandlerConfig;
use Zorachka\Framework\ErrorHandler\ErrorHandlerServiceProvider;

test('ErrorHandlerServiceProvider should contain definitions', function () {
    expect(
        array_keys(ErrorHandlerServiceProvider::getDefinitions())
    )->toMatchArray([
        RunInterface::class,
        ErrorHandler::class,
        ErrorHandlerConfig::class,
    ]);
});
