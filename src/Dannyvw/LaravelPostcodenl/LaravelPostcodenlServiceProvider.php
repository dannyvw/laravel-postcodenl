<?php

/**
 * Laravel PostcodeNL API
 *
 * @author    Danny van Wijk <info@vwmedia.nl>
 * @copyright 2014 Danny van Wijk
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/dannyvw/laravel-postcodenl
 */

namespace Dannyvw\LaravelPostcodenl;

use Illuminate\Support\ServiceProvider;
use Guzzle\Http\Client;

class LaravelPostcodenlServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('dannyvw/laravel-postcodenl');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'postcodenl',
            function ($app) {
                $config = $app['config']->get('laravel-postcodenl::config');

                return new Postcodenl(
                    new Client(),
                    $config['base_url'],
                    $config['api_key'],
                    $config['api_secret']
                );
            }
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['postcodenl'];
    }
}
