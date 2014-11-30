<?php

/**
 * Laravel PostcodeNL API
 *
 * @author    Danny van Wijk <info@vwmedia.nl>
 * @copyright 2014 Danny van Wijk
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/dannyvw/laravel-postcodenl
 */

namespace Dannyvw\LaravelPostcodenl\Facades;

use Illuminate\Support\Facades\Facade;

class Postcodenl extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'postcodenl';
    }
}
