<?php

use Illuminate\Container\Container;

if (!function_exists('app')) {
    /**
     * Get the available container instance.
     *
     * @param string|null $make
     * @param array       $parameters
     *
     * @return mixed|\Illuminate\Container\Container
     */
    function app($make = null, array $parameters = [])
    {
        if (is_null($make)) {
            return Container::getInstance();
        }

        return Container::getInstance()->make($make, $parameters);
    }
}

if (!function_exists('env')) {
    /**
     * Gets the value of an environment variable. Supports boolean, empty and null.
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    function env($key, $default = null)
    {
        $value = getenv($key);
        if ($value === false) {
            return $default ?: false;
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }
        if (preg_match('/([\'"])(.*)\1/', $value, $matches)) {
            return $matches[2];
        }

        return $value;
    }
}
