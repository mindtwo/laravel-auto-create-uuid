# Changelog

All notable changes to `laravel-auto-create-uuid` will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [3.0.0] - 2026-05-21

### Added

- Laravel Pint configuration (`pint.json`) using the `laravel` preset.
- PHPStan configuration (`phpstan.neon.dist`) at level 8 with Larastan.
- Pest test coverage for the `$uuid_column` property, the overridable
  `getUuidColumn()` method, and validation of pre-set UUIDs.
- `keywords`, expanded `description`, and additional README badges in
  `composer.json`.

### Changed

- **BC** Bumped minimum PHP version to 8.2.
- **BC** Bumped minimum Laravel version to 10; dropped support for Laravel 7,
  8, and 9.
- Switched UUID validation from `Ramsey\Uuid\Uuid::isValid()` to Laravel's
  `Str::isUuid()` to avoid a direct dependency on the Ramsey package.
- Code style and docblocks aligned with the Laravel framework conventions.
- GitHub Actions workflows tightened: `run-tests`, `phpstan`,
  `fix-php-code-style-issues`, and `update-changelog` now reference the
  `master` branch consistently and the test matrix covers PHP 8.2 - 8.4 against
  Laravel 10 - 13.

### Removed

- **BC** Unused Workbench-related composer scripts (`prepare`, `build`,
  `start`, `clear`, `post-autoload-dump`).
- Legacy `.travis.yml`, `.scrutinizer.yml`, `.styleci.yml`, `.php_cs.dist`, and
  `.phpunit-watcher.yml` configuration files.
- Direct dependency on `ramsey/uuid` in the trait (still installed transitively
  via `illuminate/support`).

## [2.6.5] - 2026-05-11

### Changed

- Allow PHP 8.5.
- Allow Laravel 13 (`illuminate/support: ^13.0`).
- Allow Pest 4 in dev requirements.

## [2.6.4] - 2025-05-20

### Added

- Pest test suite and arch test in place of plain PHPUnit.
- Larastan and Pint dev dependencies.
- GitHub Actions workflows for tests, PHPStan, code style auto-fix, and
  changelog updates.

### Changed

- Replaced the deprecated `array $except = null` parameter type on
  `replicate()` with the explicit nullable syntax `?array $except = null`,
  silencing a PHP 8.4 deprecation warning.

## [2.6.3] - 2025-02-25

### Changed

- Allow PHP 8.2.
- Allow Laravel 12 (`illuminate/support: ^12.0`).

## [2.6.2] - 2024-02-23

### Changed

- Allow Laravel 11 (`illuminate/support: ^11.0`).
- Refresh `phpunit.xml.dist` for PHPUnit 10.

## [2.6.1] - 2023-05-12

### Changed

- Minor packaging adjustments.

## [2.6] - 2023-05-12

### Added

- Laravel 10 support (`illuminate/support: ^10.0`).

## [2.5] - 2022-09-16

### Added

- The `replicate()` override now excludes the UUID column from the cloned
  attributes so the replica receives a fresh UUID via the `replicating`
  event.
- New `fillUuidColumn()` method that powers both the `creating` and
  `replicating` event listeners.

## [2.4] - 2022-02-17

### Added

- Laravel 9 support (`illuminate/support: ^9.0`).

## [2.3.1] - 2021-07-19

### Changed

- Bump supported PHP version range.

## [2.3] - 2021-05-27

### Changed

- Skip UUID generation when a valid UUID is already assigned to the model,
  preserving manually provided values.

## [2.2] - 2020-09-22

### Added

- Laravel 8 support (`illuminate/support: ^8.0`).
- Automated tests via Orchestra Testbench.

## [2.1.0] - 2020-03-23

### Added

- Laravel 7 support (`illuminate/support: ^7.0`).

## [2.0.0] - 2019-08-29

### Added

- Laravel 6 support (`illuminate/support: ^6.0`).
- Continuous integration scaffolding (Travis CI, StyleCI, Scrutinizer).

## [1.0] - 2018-12-04

### Added

- Initial release. Provides the `AutoCreateUuid` trait that fills a model's
  `uuid` column on `creating` and exposes a `getUuidColumn()` hook plus an
  optional `$uuid_column` property to customize the column name.

[Unreleased]: https://github.com/mindtwo/laravel-auto-create-uuid/compare/3.0.0...HEAD
[3.0.0]: https://github.com/mindtwo/laravel-auto-create-uuid/compare/2.6.5...3.0.0
[2.6.5]: https://github.com/mindtwo/laravel-auto-create-uuid/compare/2.6.4...2.6.5
[2.6.4]: https://github.com/mindtwo/laravel-auto-create-uuid/compare/2.6.3...2.6.4
[2.6.3]: https://github.com/mindtwo/laravel-auto-create-uuid/compare/2.6.2...2.6.3
[2.6.2]: https://github.com/mindtwo/laravel-auto-create-uuid/compare/2.6.1...2.6.2
[2.6.1]: https://github.com/mindtwo/laravel-auto-create-uuid/compare/2.6...2.6.1
[2.6]: https://github.com/mindtwo/laravel-auto-create-uuid/compare/2.5...2.6
[2.5]: https://github.com/mindtwo/laravel-auto-create-uuid/compare/2.4...2.5
[2.4]: https://github.com/mindtwo/laravel-auto-create-uuid/compare/2.3.1...2.4
[2.3.1]: https://github.com/mindtwo/laravel-auto-create-uuid/compare/2.3...2.3.1
[2.3]: https://github.com/mindtwo/laravel-auto-create-uuid/compare/2.2...2.3
[2.2]: https://github.com/mindtwo/laravel-auto-create-uuid/compare/2.1.0...2.2
[2.1.0]: https://github.com/mindtwo/laravel-auto-create-uuid/compare/2.0.0...2.1.0
[2.0.0]: https://github.com/mindtwo/laravel-auto-create-uuid/compare/1.0...2.0.0
[1.0]: https://github.com/mindtwo/laravel-auto-create-uuid/releases/tag/1.0
