# Site: Laravel with Playground and Increments User

[![Playground CI Workflow](https://github.com/gammamatrix/site-laravel/actions/workflows/ci.yml/badge.svg?branch=develop)](https://raw.githubusercontent.com/gammamatrix/site-laravel/testing/develop/testdox.txt)
[![Test Coverage](https://raw.githubusercontent.com/gammamatrix/site-laravel/testing/develop/coverage.svg)](tests)
[![PHPStan Level 9 src and tests](https://img.shields.io/badge/PHPStan-level%209-brightgreen)](.github/workflows/ci.yml#L120)

This package includes a standard [Laravel](https://laravel.com/docs/10.x) installation with the [playground-site-blade](https://github.com/gammamatrix/playground-site-blade) package.
- This uses a standard Laravel user with an incrementing ID.
- To use a UUID for the primary key on the User model, use [site-playground](https://github.com/gammamatrix/site-playground) instead.

This package may be installed with `composer create-project`

```sh
composer create-project gammamatrix/site-laravel site-example
```

Installed Playground Packages

| Package | Description|
|---------|------------|
| [playground](https://github.com/gammamatrix/playground) | A base package for Laravel integration. |
| [playground-auth](https://github.com/gammamatrix/playground-auth) | Provide authentication for Laravel applications. Allows using Sanctum. |
| [playground-blade](https://github.com/gammamatrix/playground-blade) | Provides Blade UI handling. |
| [playground-login-blade](https://github.com/gammamatrix/playground-login-blade) | Provides a Blade UI for authentication handling. |
| [playground-site-blade](https://github.com/gammamatrix/playground-site-blade) | Provides Blade UI handling for standard website. |
| [playground-test](https://github.com/gammamatrix/playground-test) | A test helper for Playground Laravel packages. |

```sh
composer require gammamatrix/playground-site-blade
composer require --dev gammamatrix/playground-test
composer require --dev tomasvotruba/bladestan
```

NOTE: Disable default Laravel welcome route.

## Testing

This application supports running integration tests with the installed Playground packages.
- Currently, over [250 Unit and Feature tests are run.](https://raw.githubusercontent.com/gammamatrix/site-laravel/testing/develop/testdox.txt)

```xml
<testsuites>
  <testsuite name="Unit">
    <directory>tests/Unit</directory>
    <directory>vendor/gammamatrix/playground/tests/Unit</directory>
    <directory>vendor/gammamatrix/playground-auth/tests/Unit</directory>
    <directory>vendor/gammamatrix/playground-blade/tests/Unit</directory>
    <directory>vendor/gammamatrix/playground-http/tests/Unit</directory>
    <directory>vendor/gammamatrix/playground-test/tests/Unit</directory>
  </testsuite>
  <testsuite name="Feature">
    <directory>tests/Feature</directory>
    <directory>vendor/gammamatrix/playground/tests/Feature</directory>
    <directory>vendor/gammamatrix/playground-auth/tests/Feature</directory>
    <directory>vendor/gammamatrix/playground-blade/tests/Feature</directory>
    <directory>vendor/gammamatrix/playground-http/tests/Feature</directory>
    <directory>vendor/gammamatrix/playground-site-blade/tests/Feature</directory>
    <directory>vendor/gammamatrix/playground-test/tests/Feature</directory>
  </testsuite>
</testsuites>

<source>
  <include>
    <directory>app</directory>
    <directory suffix=".php">vendor/gammamatrix/playground/src</directory>
    <directory suffix=".php">vendor/gammamatrix/playground-auth/src</directory>
    <directory suffix=".php">vendor/gammamatrix/playground-blade/src</directory>
    <directory suffix=".php">vendor/gammamatrix/playground-http/src</directory>
    <directory suffix=".php">vendor/gammamatrix/playground-site-blade/src</directory>
    <directory suffix=".php">vendor/gammamatrix/playground-test/src</directory>
  </include>
</source>
```

```sh
composer test
```

Test examples:

```sh
phpunit --coverage-text --filter ModelTest
```

```sh
phpunit --coverage-text --filter RouteTest
```

```sh
phpunit --coverage-text --filter InstanceTest
```

```sh
phpunit --coverage-text --filter Policy
```

```sh
phpunit --coverage-text --filter Resource
```

```sh
phpunit --coverage-text  --filter Login
```


## PHPStan

Tests at level 9 on:
- `app/`
- `config/`
- `database/`
- `resources/views/`
- `tests/Feature/`
- `tests/Unit/`
- and on Playground packages.

```sh
composer analyse
```

## Coding Standards

```sh
composer format
```

## `artisan about`

Playground packages provides information in the `artisan about` command.


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Jeremy Postlethwaite](https://github.com/gammamatrix)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
