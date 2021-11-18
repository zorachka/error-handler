<?php

declare(strict_types=1);

namespace Zorachka\Framework\ErrorHandler;

use Psr\Container\ContainerInterface;
use Whoops\Run;
use Zorachka\Framework\Container\ServiceProvider;

final class ErrorHandlerServiceProvider implements ServiceProvider
{
    /**
     * @inheritDoc
     */
    public static function getDefinitions(): array
    {
        return [
            ErrorHandler::class => new WhoopsErrorHandler(
                new Run,
            )
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getExtensions(): array
    {
        return [];
    }
}
