<?php

declare(strict_types=1);

use Zorachka\Framework\ErrorHandler\ErrorHandlerConfig;

test('ErrorHandlerConfig should be created with defaults', function () {
    $defaultConfig = ErrorHandlerConfig::withDefaults();

    expect($defaultConfig->catchExceptions())->toBeFalse();
});

test('ErrorHandlerConfig should be able to set catch exceptions', function () {
    $defaultConfig = ErrorHandlerConfig::withDefaults();
    $newConfig = $defaultConfig->withCatchExceptions(true);

    expect($newConfig->catchExceptions())->toBeTrue();
});
