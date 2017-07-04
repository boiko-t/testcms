<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 23.06.2017
 * Time: 0:17
 */

namespace application\core;


class Redirect
{
    public static function Home()
    {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/home');
    }

    public static function To($path)
    {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $path);
    }
}