<?php
namespace core;
class Bootstrap
{
    public static function run()
    {
        self::parseUrl();
    }

    public static function parseUrl()
    {

        if (isset($_GET['s'])) {
            $arg = explode('/', $_GET['s']);
            $class = '\web\controllers\\' . $arg[0];
            $method = $arg[1];

        } else {
            $class = '\web\controllers\index';
            $method = 'show';
        }

        echo (new $class())->$method();

    }
}