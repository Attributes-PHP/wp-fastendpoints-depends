<?php

/**
 * Plugin Name: FastEndpoints Depends
 * Plugin URI:  https://github.com/matapatos/wp-fastendponts-depends
 * Description: Speed up your REST endpoints by treating plugins as dependencies
 * Version:     1.0.0
 * Author:      André Gil
 * Author URI:  https://github.com/matapatos
 *
 * @version 1.0.0
 *
 * @license MIT
 */

use Wp\FastEndpoints\Depends\DependenciesGenerator;
use Wp\FastEndpoints\Depends\DependsAutoloader;

$composer = __DIR__.'/vendor/autoload.php';
if (! file_exists($composer)) {
    wp_die(
        esc_html__(
            'Error locating autoloader in plugins/wp-fastendpoints-depends. Please run <code>composer install</code>.',
            'fastendpoints-depends',
        ),
    );
}

require_once $composer;

$autoloader = $autoloader ?? new DependsAutoloader;
$autoloader->register();

$isToUpdateOnPluginActivation = defined('FASTENDPOINTS_DEPENDS_REFRESH_ON_PLUGIN_ACTIVATION') ? \FASTENDPOINTS_DEPENDS_REFRESH_ON_PLUGIN_ACTIVATION : true;
$dependencies = $generator ?? new DependenciesGenerator(null, $isToUpdateOnPluginActivation);
$dependencies->register();
