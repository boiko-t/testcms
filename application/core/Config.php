<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 14.06.2017
 * Time: 12:20
 */

namespace application\core;


class Config
{
    private static $config;

    public static function Get($key)
    {
        if (!$key)
            return self::$config;
        if (!self::$config) {
            $pathToFile = './common/configs.php';
            if (!file_exists($pathToFile))
                return false;

            self::$config = require $pathToFile;
        }
        return self::$config[$key];
    }
}