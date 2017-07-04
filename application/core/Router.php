<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 13.06.2017
 * Time: 21:15
 */

namespace application\core;


class Router
{
    public static function GetControllerName()
    {
        $url = Request::Get('url');
        $parsedUrl = explode('/', $url);
        if (!$parsedUrl[0])
            $controllerName = Config::Get('CONTROLLERS_NAMESPACE') .
                Config::Get('DEFAULT_CONTROLLER');
        else $controllerName = Config::Get('CONTROLLERS_NAMESPACE') .
            ucfirst(array_shift($parsedUrl)) . 'Controller';
        return $controllerName;
    }

    public static function GetActionName()
    {
        $url = Request::Get('url');
        return explode('/', $url)[1];
    }

    public static function GetActionParameters(){
        $url = Request::Get('url');
        $parsedUrl = explode('/', $url);
        return array_slice($parsedUrl, 2)[0];
    }
}