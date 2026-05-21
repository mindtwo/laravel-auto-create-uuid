# Laravel Auto Create UUID

[![Latest Stable Version](https://img.shields.io/packagist/v/mindtwo/laravel-auto-create-uuid?style=flat-square)](https://packagist.org/packages/mindtwo/laravel-auto-create-uuid)
[![run-tests](https://img.shields.io/github/actions/workflow/status/mindtwo/laravel-auto-create-uuid/run-tests.yml?branch=master&label=tests&style=flat-square)](https://github.com/mindtwo/laravel-auto-create-uuid/actions/workflows/run-tests.yml)
[![PHPStan](https://img.shields.io/github/actions/workflow/status/mindtwo/laravel-auto-create-uuid/phpstan.yml?branch=master&label=phpstan&style=flat-square)](https://github.com/mindtwo/laravel-auto-create-uuid/actions/workflows/phpstan.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/mindtwo/laravel-auto-create-uuid?style=flat-square)](https://packagist.org/packages/mindtwo/laravel-auto-create-uuid)
[![License](https://img.shields.io/packagist/l/mindtwo/laravel-auto-create-uuid?style=flat-square)](LICENSE.md)

Automatically populate a UUID column on Eloquent models when they are created
or replicated. Drop the trait onto any model and the rest works without
configuration.

## Installation

Install the package via Composer:

```bash
composer require mindtwo/laravel-auto-create-uuid
```

## Requirements

- PHP 8.2+
- Laravel 10, 11, 12, or 13

## Usage

### Add the trait to a model

```php
use Illuminate\Database\Eloquent\Model;
use mindtwo\LaravelAutoCreateUuid\AutoCreateUuid;

class Example extends Model
{
    use AutoCreateUuid;
}
```

### Add a UUID column to the migration

```php
$table->uuid('uuid')->unique();
```

The trait listens to the `creating` and `replicating` model events and fills
the configured UUID column with a new UUID v4 whenever the column is empty or
holds an invalid UUID.

### Customize the UUID column

The default column name is `uuid`. To use a different column, either define a
`$uuid_column` property:

```php
class Example extends Model
{
    use AutoCreateUuid;

    protected string $uuid_column = 'identifier';
}
```

or override the `getUuidColumn()` method:

```php
class Example extends Model
{
    use AutoCreateUuid;

    public function getUuidColumn(): string
    {
        return 'identifier';
    }
}
```

### Replicating models

The trait overrides `Model::replicate()` to ensure the UUID column is excluded
from the cloned attributes, so the replica receives a fresh UUID via the
`replicating` event.

## Testing

```bash
composer test
```

## Static analysis

```bash
composer analyse
```

## Code style

```bash
composer format
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for a list of recent changes.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email info@mindtwo.de
instead of using the issue tracker.

## Credits

- [mindtwo GmbH](https://github.com/mindtwo)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more
information.
