<?php
namespace core;
class Bootstrap
{
    public static function run()
    {
        self::setEnv();
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

    public static function setEnv()
    {
        $env = parse_ini_file(realpath(APP_PATH . '/.env'));
        $config = include APP_PATH . '/config/config.php';
        $config = array_merge($config, $env);
        foreach ($config as $key => $value) {
            putenv("$key=$value");
        }
    }
}