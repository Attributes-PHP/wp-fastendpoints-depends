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

### Using Bedrock <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 74 74"><path d="M1.233 0L0 1.233v16.034l1.057 1.057 34.886-5.815L37 13.567v11.1l35.52-5.92 1.48-1.48V1.233L72.767 0H1.233zm.247 30.587L0 32.067v9.866l1.057 1.057L37 37V24.667l-35.52 5.92zM37 37v12.334l35.52-5.92 1.48-1.48v-9.867l-1.057-1.057L37 37zM1.48 55.253L0 56.733v16.034L1.233 74h71.534L74 72.767V56.733l-1.057-1.057-34.886 5.815L37 60.434v-11.1l-35.52 5.92z" fill="#525DDC"></path></svg>

1. Navigate to the Bedrock root folder
2. Install the following composer package `composer require attributes-php/wp-fastendpoints-depends`
3. Run the following WP CLI command `wp fastendpoints depends` or activate any plugin on the website

### Using standard WordPress  <svg xmlns="http://www.w3.org/2000/svg" role="img" width="13" height="13" viewBox="0 0 28 28"><path fill="currentColor" d="M13.6052 0.923525C16.1432 0.923525 18.6137 1.67953 20.7062 3.09703C22.7447 4.47403 24.3512 6.41803 25.3097 8.68603C26.9837 12.6415 26.5382 17.164 24.1352 20.7145C22.7582 22.753 20.8142 24.3595 18.5462 25.318C14.5907 26.992 10.0682 26.5465 6.51772 24.1435C4.47922 22.7665 2.87272 20.8225 1.91422 18.5545C0.240225 14.599 0.685725 10.0765 3.08872 6.52603C4.46572 4.48753 6.40973 2.88103 8.67772 1.92253C10.2302 1.26103 11.9177 0.923525 13.6052 0.923525ZM13.6052 0.113525C6.15322 0.113525 0.105225 6.16153 0.105225 13.6135C0.105225 21.0655 6.15322 27.1135 13.6052 27.1135C21.0572 27.1135 27.1052 21.0655 27.1052 13.6135C27.1052 6.16153 21.0572 0.113525 13.6052 0.113525Z"></path><path fill="currentColor" d="M2.36011 13.6133C2.36011 17.9198 4.81711 21.8618 8.70511 23.7383L3.33211 9.03684C2.68411 10.4813 2.36011 12.0338 2.36011 13.6133ZM21.2061 13.0463C21.2061 11.6558 20.7066 10.6973 20.2746 9.94134C19.8426 9.18534 19.1676 8.22684 19.1676 7.30884C19.1676 6.39084 19.9506 5.31084 21.0576 5.31084H21.2061C16.6296 1.11234 9.51511 1.42284 5.31661 6.01284C4.91161 6.45834 4.53361 6.93084 4.20961 7.43034H4.93861C6.11311 7.43034 7.93561 7.28184 7.93561 7.28184C8.54311 7.24134 8.61061 8.13234 8.00311 8.21334C8.00311 8.21334 7.39561 8.28084 6.72061 8.32134L10.8111 20.5118L13.2681 13.1273L11.5131 8.32134C10.9056 8.28084 10.3386 8.21334 10.3386 8.21334C9.73111 8.17284 9.79861 7.25484 10.4061 7.28184C10.4061 7.28184 12.2691 7.43034 13.3626 7.43034C14.4561 7.43034 16.3596 7.28184 16.3596 7.28184C16.9671 7.24134 17.0346 8.13234 16.4271 8.21334C16.4271 8.21334 15.8196 8.28084 15.1446 8.32134L19.2081 20.4173L20.3691 16.7453C20.8821 15.1388 21.1926 14.0048 21.1926 13.0328L21.2061 13.0463ZM13.7946 14.5853L10.4196 24.3998C12.6876 25.0613 15.1041 25.0073 17.3316 24.2243L17.2506 24.0758L13.7946 14.5853ZM23.4741 8.21334C23.5281 8.59134 23.5551 8.98284 23.5551 9.37434C23.5551 10.5218 23.3391 11.8043 22.7046 13.3973L19.2621 23.3333C24.5271 20.2688 26.4036 13.5593 23.4741 8.21334Z"></path></svg>

1. Download plugin from WordPress store
2. Install plugin as a [MU-plugin](https://developer.wordpress.org/advanced-administration/plugins/mu-plugins/)
3. Run the following WP CLI command `wp fastendpoints depends` or activate any plugin on the website

## New deployment

When doing a new deployment you will need to re-generate the route dependencies by either:

1. Re-run the following WP CLI command `wp fastendpoints depends` or to
2. Activate any plugin on the website

FastEndpoints Depends was created by **[André Gil](https://www.linkedin.com/in/andre-gil/)** and is open-sourced software licensed under the **[MIT license](https://opensource.org/licenses/MIT)**.
