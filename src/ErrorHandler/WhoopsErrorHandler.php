<?php

declare(strict_types=1);

namespace Zorachka\Framework\ErrorHandler;

use Whoops\Handler\PlainTextHandler;
use Whoops\Handler\PrettyPageHandler;
use Whoops\RunInterface;

final class WhoopsErrorHandler implements ErrorHandler
{
    private RunInterface $whoops;

    public function __construct(RunInterface $whoops)
    {
        $this->whoops = $whoops;
    }

    public function register(): void
    {
        if (self::isCli()) {
            $this->whoops->pushHandler(new PlainTextHandler);
        } else {
            $this->whoops->pushHandler(new PrettyPageHandler);
        }

        $this->whoops->register();
    }

    private static function isCli(): bool
    {
        return php_sapi_name() === 'cli';
    }
}
