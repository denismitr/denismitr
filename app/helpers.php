<?php

if ( ! function_exists('business') ) {
    function business(string $key = null) {
        if ( ! $key) {
            return config('business');
        }

        $lang = app()->getLocale();

        return config('business.' . $lang . '.' . $key);
    }
}

if ( ! function_exists('return_if') ) {
    function return_if($condition, $value = 'active')
    {
        if ($condition) {
            return $value;
        }
    }
}

if ( ! function_exists('path_is') ) {
    function path_is(string $pattern): bool
    {
        return request()->is($pattern);
    }
}

if ( ! function_exists('route_is') ) {
    function route_is(string $pattern): bool
    {
        return request()->routeIs($pattern);
    }
}