<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 13.06.2017
 * Time: 21:17
 */

namespace application\core;


class Auth
{
    public static function CheckAuth()
    {
        if (!Session::Get('loggedIn') && !self::CheckCookie())
            return false;
        $mapper = new ModelMapper('users', 'application\models\User');
        $id = Session::Get('userId');
        $query = "SELECT * FROM users WHERE userId = $id";
        $user = $mapper->RunQuery($query)[0];
        return !empty($user);
    }

    public static function IsUserAdmin()
    {
        $id = Session::Get('userId');
        if(!$id)
            return false;
        $query = "SELECT role FROM users WHERE userId = $id";
        $statement = DbProvider::getInstance()->execute($query);
        $role = $statement->fetch(\PDO::FETCH_ASSOC);
        return $role && $role['role'] == 0;
    }

    public static function CheckCookie()
    {
        $id = $_COOKIE['userId'];
        $token = $_COOKIE['userToken'];
        if(!$id)
            return false;
        $mapper = new ModelMapper('users', 'application\models\User');
        $query = "SELECT role FROM users WHERE userId = $id and token = $token";
        $user = $mapper->RunQuery($query)[0];
        return !empty($user);
    }

    public static function CurrentUserId()
    {
        if (!Session::Get('loggedIn'))
            if(!self::CheckCookie())
                return null;
            else return $_COOKIE['userId'];
        else return Session::Get('userId');
    }
}