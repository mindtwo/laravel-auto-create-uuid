# Laravel Auto Create Uuid on Eloquent Models
[![Build Status](https://travis-ci.org/mindtwo/laravel-auto-create-uuid.svg?branch=master)](https://travis-ci.org/mindtwo/laravel-auto-create-uuid)
[![StyleCI](https://styleci.io/repos/160357333/shield)](https://styleci.io/repos/160357333)
[![Quality Score](https://img.shields.io/scrutinizer/g/mindtwo/laravel-auto-create-uuid.svg?style=flat-square)](https://scrutinizer-ci.com/g/mindtwo/laravel-auto-create-uuid)
[![Latest Stable Version](https://img.shields.io/packagist/v/mindtwo/laravel-auto-create-uuid?style=flat-square)](https://packagist.org/packages/mindtwo/laravel-auto-create-uuid)
[![Total Downloads](https://img.shields.io/packagist/dt/mindtwo/laravel-auto-create-uuid?style=flat-square)](https://packagist.org/packages/mindtwo/laravel-auto-create-uuid)
[![MIT Software License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE.md)

## Installation

You can install the package via composer:

```bash
composer require mindtwo/laravel-auto-create-uuid
```

## How to use?

### Prepare eloquent model

Simply use the AutoCreateUuid trait in your eloquent model.

```php
namespace example;

use Illuminate\Database\Eloquent\Model;
use mindtwo\LaravelAutoCreateUuid\AutoCreateUuid;

class Example extends Model
{
    use AutoCreateUuid;
}
```

### Add UUID column to migration

Make sure to add the column in your migration file.

```php
$table->string('uuid', 36)->unique();
```

### Customize UUID attribute

The default attribute name for the auto generated UUID is 'uuid'. However you
can customize it, if you need. There are two possibilities to do so. 

Either you set up a property named 'uuid_column':

```php
namespace example;

use Illuminate\Database\Eloquent\Model;
use mindtwo\LaravelAutoCreateUuid\AutoCreateUuid;

class Example extends Model
{
    use AutoCreateUuid;
    
    protected $uuid_column = 'id'
}
```

or you overload the getUuidColumn() method:


```php
namespace example;

use Illuminate\Database\Eloquent\Model;
use mindtwo\LaravelAutoCreateUuid\AutoCreateUuid;

class Example extends Model
{
    use AutoCreateUuid;
    
    /**
     * Get the column name for uuid attribute.
     *
     * @return string
     */
    public function getUuidColumn(): string
    {
        return 'id';
    }
}
```

In both cases the attribute name for the UUID is now 'id' instead of 'uuid'.
 

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email info@mindtwo.de instead of using the issue tracker.

## Credits

- [mindtwo GmbH](https://github.com/mindtwo)
- [All Other Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
 
