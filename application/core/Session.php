<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 16.06.2017
 * Time: 14:56
 */

namespace application\core;


use application\models\User;

class Session
{
    public static function Init()
    {
        if (session_id() == '') {
            session_start();
        }
    }

    public static function Destroy()
    {
        session_destroy();
    }

    public static function Set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function Get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }else return null;
    }

    public static function LoginUser(User $user)
    {
        self::Set('loggedIn', true);
        self::Set('userId', $user->userId);
    }

    public static function RememberUser(User $user)
    {
        $_COOKIE['userId'] = $user->userId;
        $_COOKIE['userToken'] = $user->token;
    }

    public static function CleanCookie()
    {
        unset($_COOKIE['userId']);
        unset($_COOKIE['userToken']);
    }
}