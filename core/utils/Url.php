<?php 
namespace Core\Utils;

use Core\Utils\Config;

abstract class URL
{
    public static function getBaseUrl()
    {
        return Config::get('app.url');
    }

    public static function redirectTo($url)
    {
        header('Location: ' . static::getBaseUrl() . $url);
        die();
    }
}