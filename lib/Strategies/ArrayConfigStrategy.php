<?php

namespace PHPNomad\ArrayJsonConfig\Strategies;

use PHPNomad\Config\Interfaces\ConfigStrategy;
use PHPNomad\Utils\Helpers\Arr;

class ArrayConfigStrategy implements ConfigStrategy
{
    /**
     * Holds all registered configuration data.
     *
     * @var array
     */
    protected array $configData = [];


    /**
     * Registers a top-level set of configuration data.
     *
     * @param string $key
     * @param array $configData
     * @return $this
     */
    public function register(string $key, array $configData)
    {
        $this->configData[$key] = $configData;

        return $this;
    }

    /**
     * Checks if a configuration key exists.
     *
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return $this->get($key, false) !== false;
    }

    /**
     * Gets a configuration value.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return Arr::dot($this->configData, $key, $default);
    }
}
