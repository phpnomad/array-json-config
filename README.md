# phpnomad/array-json-config

[![Latest Version](https://img.shields.io/packagist/v/phpnomad/array-json-config.svg)](https://packagist.org/packages/phpnomad/array-json-config)
[![Total Downloads](https://img.shields.io/packagist/dt/phpnomad/array-json-config.svg)](https://packagist.org/packages/phpnomad/array-json-config)
[![PHP Version](https://img.shields.io/packagist/php-v/phpnomad/array-json-config.svg)](https://packagist.org/packages/phpnomad/array-json-config)
[![License](https://img.shields.io/packagist/l/phpnomad/array-json-config.svg)](https://packagist.org/packages/phpnomad/array-json-config)

`phpnomad/array-json-config` provides two concrete strategies for `phpnomad/config`: an in-memory array-backed `ConfigStrategy` and a JSON file loader that implements `ConfigFileLoaderStrategy`. This package is just the strategy classes. If you want them wired into a DI container and registered at bootstrap, use `phpnomad/json-config-integration`, which depends on this package.

## Installation

```bash
composer require phpnomad/array-json-config
```

In most PHPNomad applications you install `phpnomad/json-config-integration` instead, which pulls this package in as a dependency.

## Overview

- `ArrayConfigStrategy` implements `PHPNomad\Config\Interfaces\ConfigStrategy`. It holds registered configuration data in a protected array and exposes `register()`, `has()`, and `get()` methods. Lookups support dot notation via `PHPNomad\Utils\Helpers\Arr::dot()`, so `get('database.default.host')` walks nested arrays.
- `JsonFileLoader` implements `PHPNomad\Config\Interfaces\ConfigFileLoaderStrategy`. Its `loadFileConfigs()` method reads a path, runs `json_decode()`, and throws `PHPNomad\Config\Exceptions\ConfigException` if the file cannot be parsed into an array.
- Both classes live under the `PHPNomad\ArrayJsonConfig\Strategies` namespace.
- Any code that depends on the `phpnomad/config` interfaces can consume these strategies without modification.
- Pair with `phpnomad/json-config-integration` to bind the strategies to the DI container and register configs against `ConfigService` at load time.

## Documentation

Full documentation for PHPNomad lives at [phpnomad.com](https://phpnomad.com).

## License

MIT. See [LICENSE.txt](LICENSE.txt).
