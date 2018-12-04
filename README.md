# Laravel Multilingual
[![Latest Stable Version](https://poser.pugx.org/mindtwo/laravel-auto-create-uuid/v/stable)](https://packagist.org/packages/mindtwo/laravel-auto-create-uuid)
[![Total Downloads](https://poser.pugx.org/mindtwo/laravel-auto-create-uuid/downloads)](https://packagist.org/packages/mindtwo/laravel-auto-create-uuid)
[![License](https://poser.pugx.org/mindtwo/laravel-auto-create-uuid/license)](https://packagist.org/packages/mindtwo/laravel-auto-create-uuid)

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
 
