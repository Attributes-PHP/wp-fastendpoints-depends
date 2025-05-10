# WP-FastEndpoints-Depends

<img src="https://raw.githubusercontent.com/Attributes-PHP/wp-fastendpoints-depends/main/docs/images/wp-fastendpoints-depends-wallpaper.png" alt="Treating plugins as dependencies">
<p align="center">
    <a href="https://github.com/Attributes-PHP/wp-fastendpoints-depends/actions"><img alt="GitHub Actions Workflow Status (main)" src="https://img.shields.io/github/actions/workflow/status/Attributes-PHP/wp-fastendpoints-depends/tests.yml"></a>
    <a href="https://codecov.io/gh/Attributes-PHP/wp-fastendpoints-depends" ><img alt="Code Coverage" src="https://codecov.io/gh/Attributes-PHP/wp-fastendpoints-depends/graph/badge.svg?token=8N7N9NMGLG"/></a>
    <a href="https://en-gb.wordpress.org/plugins/fastendpoints-depends/"><img alt="WordPress Plugin Version" src="https://img.shields.io/wordpress/plugin/v/fastendpoints-depends"></a>
    <a href="https://packagist.org/packages/Attributes-PHP/wp-fastendpoints"><img alt="Supported WordPress Versions" src="https://img.shields.io/badge/6.x-versions?logo=wordpress&label=versions"></a>
    <a href="https://opensource.org/licenses/MIT"><img alt="Software License" src="https://img.shields.io/badge/MIT?label=MIT"></a>
</p>

------
**FastEndpoints Depends** allows you to treat plugins as dependencies to speed up your REST endpoints

- Explore our docs at **[FastEndpoints Depends Docs »](https://attributes-php.github.io/wp-fastendpoints/advanced-user-guide/plugins-as-dependencies/)**

## Features

- Only includes the plugins you need for the endpoint
- No code changes needed. Just install and activate this plugin as an MU plugin
- Full support to both native WP REST endpoints and [WP-FastEndpoints](https://github.com/attributes-php/wp-fastendpoints)

## Requirements

- PHP 8.1+
- WordPress 6.x
- Install as a [must-use plugin](https://developer.wordpress.org/advanced-administration/plugins/mu-plugins/)

## Installation

### Using [Bedrock](https://roots.io/bedrock/)

1. Navigate to the Bedrock root folder
2. Install the following composer package `composer require attributes-php/wp-fastendpoints-depends`
3. Run the following WP CLI command `wp fastendpoints depends` or activate any plugin on the website
4. Enjoy 😊

### Using standard WordPress structure

1. Download plugin from WordPress store
2. Install plugin as a [MU-plugin](https://developer.wordpress.org/advanced-administration/plugins/mu-plugins/)
3. Run the following WP CLI command `wp fastendpoints depends` or activate any plugin on the website
4. Enjoy 😊

## New deployment

When doing a new deployment you will need to re-generate the route dependencies by either:

1. Re-run the following WP CLI command `wp fastendpoints depends` or to
2. Activate any plugin on the website

FastEndpoints Depends was created by **[André Gil](https://www.linkedin.com/in/andre-gil/)** and is open-sourced software licensed under the **[MIT license](https://opensource.org/licenses/MIT)**.
