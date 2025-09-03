<?php

namespace Attributes\Wp\FastEndpoints\Depends;

use WP_Rewrite;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Holds logic to load plugins as dependencies for REST endpoints
 *
 * @author André Gil <andre_gil22@hotmail.com>
 *
 * @link https://github.com/matapatos/wp-fastendponts-depends
 */
class DependsAutoloader
{
    /** @var ?static Singleton instance */
    protected static ?DependsAutoloader $instance = null;

    private ?string $configFilePath;

    public function __construct(?string $configFilePath = null)
    {
        $this->configFilePath = $configFilePath;
    }

    /**
     * Registers the filter that removes unnecessary plugins for a given REST endpoint
     */
    public function register(): void
    {
        if (! $this->canRegister()) {
            return;
        }

        self::$instance = $this;
        add_filter('option_active_plugins', $this->discardUnnecessaryPlugins(...), -99);
    }

    /**
     * Discards unnecessary plugins from a FastEndpoint
     *
     * @internal
     */
    public function discardUnnecessaryPlugins(array $activePlugins)
    {
        if (! $activePlugins) {
            return $activePlugins;
        }

        $fastEndpointsDependencies = $this->getFastEndpointDependencies();
        $currentUrlPath = $this->getCurrentRequestUrlPath();
        if (is_null($currentUrlPath)) {
            return $activePlugins;
        }

        foreach ($fastEndpointsDependencies as $route => $routeDependencies) {
            $fullRestRoute = '/'.rest_get_url_prefix();
            if (! str_starts_with($route, '/')) {
                $fullRestRoute .= '/';
            }
            $fullRestRoute .= $route;
            if (! preg_match('@^'.$fullRestRoute.'$@i', $currentUrlPath, $matches)) {
                continue;
            }

            return array_values(array_intersect($activePlugins, $routeDependencies));
        }

        return $activePlugins;
    }

    /**
     * Retrieves the dependencies needed for a given endpoint
     *
     * @array<string>
     *
     * @return array<string,array<string>>
     */
    protected function getFastEndpointDependencies(): array
    {
        $configFilePath = $this->getConfigFilePath();
        if (! file_exists($configFilePath)) {
            return [];
        }

        $allEndpoints = include $configFilePath;
        if (! $allEndpoints) {
            return [];
        }

        $method = $_SERVER['REQUEST_METHOD'];
        if (! isset($allEndpoints[$method])) {
            return [];
        }

        return $allEndpoints[$method];
    }

    /**
     * Checks if the autoloader can be registered
     */
    protected function canRegister(): bool
    {
        if (! is_blog_installed()) {
            return false;
        }

        // Already registered?
        if (self::$instance) {
            return false;
        }

        if ($this->isDisabled()) {
            return false;
        }

        return $this->isRestRequest();
    }

    /**
     * Checks if a given request is a REST request.
     *
     * @link https://wordpress.stackexchange.com/questions/221202/does-something-like-is-rest-exist#answer-317041
     *
     * @author matzeeable
     */
    protected function isRestRequest(): bool
    {
        if ($this->isWpRestRequestFlagEnabled()) {
            return true;
        }

        if (isset($_GET['rest_route']) && str_starts_with($_GET['rest_route'], '/')) {
            return true;
        }

        $currentUrlPath = $this->getCurrentRequestUrlPath();
        if (is_null($currentUrlPath)) {
            return false;
        }

        $restUrl = wp_parse_url(trailingslashit(rest_url()));

        return str_starts_with($currentUrlPath, $restUrl['path']);
    }

    /**
     * Checks for the flag that toggles the plugins as dependencies behaviour
     */
    protected function isDisabled(): bool
    {
        return defined('FASTENDPOINTS_DEPENDS_ENABLED') && ! \FASTENDPOINTS_DEPENDS_ENABLED;
    }

    /**
     * Checks for the flag that WordPress sets when handling a REST request
     */
    protected function isWpRestRequestFlagEnabled(): bool
    {
        return defined('REST_REQUEST') && \REST_REQUEST;
    }

    /**
     * Retrieves the current request URL path
     */
    protected function getCurrentRequestUrlPath(): ?string
    {
        global $wp_rewrite;
        if ($wp_rewrite === null) {
            $wp_rewrite = new WP_Rewrite;
        }

        return wp_parse_url(add_query_arg([]))['path'];
    }

    /**
     * Removes all hooks that trigger this autoloader
     */
    public function unregister(): void
    {
        self::$instance = null;
        remove_filter('option_active_plugins', $this->discardUnnecessaryPlugins(...));
    }

    /**
     * Retrieves the file path which holds the REST dependencies
     */
    protected function getConfigFilePath(): string
    {
        if ($this->configFilePath) {
            return $this->configFilePath;
        }

        if (defined('FASTENDPOINTS_DEPENDS_CONFIG_FILEPATH')) {
            return \FASTENDPOINTS_DEPENDS_CONFIG_FILEPATH;
        }

        return plugin_dir_path(__FILE__).'/../config.php';
    }
}
