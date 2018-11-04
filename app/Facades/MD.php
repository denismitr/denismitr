<?php

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * Class MD
 * @package App\Facades
 *
 * @method static text($string)
 * @method static line($string)
 */
class MD extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'md';
    }
}