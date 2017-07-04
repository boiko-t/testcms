<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 13.06.2017
 * Time: 21:15
 */

namespace application\core;


class Request
{
    public static function IsMethodPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    public static function IsMethodGet()
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    public static function Get($key)
    {
        return $_GET[$key];
    }

    public static function Post($key)
    {
        return $_POST[$key];
    }

    public static function File($key)
    {
        return $_FILES[$key];
    }

    public static function Cookie()
    {

    }
}