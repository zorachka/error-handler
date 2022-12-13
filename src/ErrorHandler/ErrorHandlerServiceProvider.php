<?php

declare(strict_types=1);

namespace Zorachka\Framework\ErrorHandler;

use Psr\Container\ContainerInterface;
use Whoops\Run;
use Whoops\RunInterface;
use Zorachka\Container\ServiceProvider;

final class ErrorHandlerServiceProvider implements ServiceProvider
{
    /**
     * @inheritDoc
     */
    public static function getDefinitions(): array
    {
        return [
            RunInterface::class => fn() => new Run,
            ErrorHandler::class => function(ContainerInterface $container) {
                /** @var RunInterface $run */
                $run = $container->get(RunInterface::class);
                /** @var ErrorHandlerConfig $config */
                $config = $container->get(ErrorHandlerConfig::class);

                return new WhoopsErrorHandler(
                    $run,
                    $config->catchExceptions(),
                );
            },
            ErrorHandlerConfig::class => fn() => ErrorHandlerConfig::withDefaults(),
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
