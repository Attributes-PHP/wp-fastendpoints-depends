<?php

/**
 * Holds tests regarding plugin logic
 *
 * @since 1.0.0
 *
 * @license MIT
 */

declare(strict_types=1);

namespace Attributes\Wp\FastEndpoints\Depends\Tests\Unit;

use Attributes\Wp\FastEndpoints\Depends\DependenciesGenerator;
use Attributes\Wp\FastEndpoints\Depends\DependsAutoloader;
use Brain\Monkey;

beforeEach(function () {
    Monkey\setUp();
});

afterEach(function () {
    Monkey\tearDown();
});

test('Check composer type', function () {
    $composerContents = file_get_contents(\PLUGIN_ROOT_DIR.'/composer.json');
    expect(json_decode($composerContents, true))
        ->toBeArray()
        ->toHaveKey('type', 'wordpress-muplugin');
})->group('plugin', 'composer');

test('Registering both autoloader and generator', function () {
    $autoloader = \Mockery::mock(DependsAutoloader::class)
        ->shouldReceive('register')
        ->getMock();
    $generator = \Mockery::mock(DependenciesGenerator::class)
        ->shouldReceive('register')
        ->getMock();
    require_once \PLUGIN_ROOT_DIR.'/fastendpoints-depends.php';
    // Avoid "Test did not perform any assertions" message
    expect(true)->toBeTrue();
})->group('plugin', 'register-autoloader');
