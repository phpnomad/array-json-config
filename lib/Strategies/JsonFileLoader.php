<?php

namespace PHPNomad\ArrayJsonConfig\Strategies;

use PHPNomad\Config\Exceptions\ConfigException;
use PHPNomad\Config\Interfaces\ConfigFileLoaderStrategy;

class JsonFileLoader implements ConfigFileLoaderStrategy
{
    /**
     * @inheritDoc
     */
    public function loadFileConfigs(string $path): array
    {
        $result = json_decode(file_get_contents($path), true);

        if (!is_array($result)) {
            throw new ConfigException('Invalid JSON file');
        }

        return $result;
    }
}