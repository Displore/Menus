# Displore Menus

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Quality Score][ico-code-quality]][link-code-quality]

Basic menus designed for but not dependend on Laravel.

## Install

### Via [Displore Core][link-displore-core]

``` bash
$ php artisan displore:install menus
```
This does everything for you, from the Composer requirement to the addition of Laravel service providers.

### Via Composer

``` bash
$ composer require displore/menus
```
This requires the addition of the Menus service provider and Menus facade alias to config/app.php if you use the package with Laravel.
`Displore\Menus\MenusServiceProvider::class,`
and
`Displore\Menus\Facades\Menu::class,`

### Configuration

Run the following command to publish the configuration file in which you can set the different menus.
```bash
$ php artisan vendor:publish --tag=displore.menus.config
```

## Usage

This package comes with a very basic implementation of a menu builder. By binding the `Displore\Core\Contracts\MenuBuilder` interface to another class you can easily swap it, for example with the excellent menu package created by [Spatie](https://github.com/spatie/laravel-menu).

As an example, You can pass the menu from the configuration to your views in a controller:
```php
$menu = Menu::from(Config::get('displore.menu'))->build('main');
return view('index')->with($menu);
```


## Change log

Please see [changelog](changelog.md) for more information what has changed recently.

## Testing

The package comes with unit tests.
In a Laravel application, with [Laravel Packager](https://github.com/Jeroen-G/laravel-packager):
``` bash
$ php artisan packager:git *Displore Github url*
$ php artisan packager:tests Displore Menus
$ phpunit
```

## Contributing

Please see [contributing](contributing.md) for details.

## Credits

- [JeroenG][link-author]
- [All Contributors][link-contributors]

## License

The EUPL License. Please see the [License File](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/displore/menus.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/displore/menus.svg?style=flat-square

[link-displore-core]: https://github.com/displore/core

[link-packagist]: https://packagist.org/packages/displore/menus
[link-code-quality]: https://scrutinizer-ci.com/g/displore/menus
[link-author]: https://github.com/Jeroen-G
[link-contributors]: ../../contributors
