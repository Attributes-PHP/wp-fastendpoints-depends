<?php

/**
 * Plugin Name: FastEndpoints Depends
 * Plugin URI:  https://github.com/Attributes-PHP/wp-fastendpoints-depends
 * Description: Treats WordPress plugins as dependencies to speed up your REST API's
 * Version:     2.0.0
 * Author:      André Gil
 * Author URI:  https://github.com/Attributes-PHP
 *
 * @version 1.0.1
 *
 * @license MIT
 */

use Attributes\Wp\FastEndpoints\Depends\DependenciesGenerator;
use Attributes\Wp\FastEndpoints\Depends\DependsAutoloader;

$composer = __DIR__.'/vendor/autoload.php';
if (! file_exists($composer)) {
    wp_die(
        esc_html__(
            'Error locating autoloader in mu-plugins/fastendpoints-depends. Please run <code>composer install</code>.',
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
