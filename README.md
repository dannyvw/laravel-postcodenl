# PostcodeNL Api Laravel

This package helps you integrating the [Postcode.nl API](http://api.postcode.nl) into your Laravel project.

## Requirements

- PHP >=5.4
- Laravel
- Guzzle >= 3.8

## Installation

Require this package with composer using the following command:

    composer require dannyvw/laravel-postcodenl

or add the following to your composer.json file:

    {
        "require": {
            "dannyvw/laravel-postcodenl": "dev-master"
        }
    }

Add the ServiceProvider to the providers array in app/config/app.php

    'Dannyvw\LaravelPostcodenl\LaravelPostcodenlServiceProvider',

Add the facade to the aliases array in app/config/app.php

    'Postcodenl' => 'Dannyvw\LaravelPostcodenl\Facade\Postcodenl',

Publish the configuration

	php artisan config:publish dannyvw/laravel-postcodenl

Run composer update

    composer update

## License

Dannyvw\LaravelPostcodeNL is licensed under the [MIT License](http://opensource.org/licenses/MIT).

Copyright 2014 Danny van Wijk
