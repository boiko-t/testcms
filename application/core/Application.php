<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 13.06.2017
 * Time: 21:16
 */

namespace application\core;

class Application
{
    private $controllerName;
    private $actionName;

    public function __construct()
    {
        Session::Init();
        $this->LaunchController();
    }

    private function InitErrorController()
    {
        $this->controllerName = Config::Get('CONTROLLERS_NAMESPACE') . 'ErrorController';
        $this->actionName = 'Error404';

    }

    private function LaunchController()
    {
        $this->controllerName = Router::GetControllerName();
        $this->actionName = Router::GetActionName();
        if (!class_exists($this->controllerName)) {
            $this->InitErrorController();
        }

        $controllerObject = new $this->controllerName();
        if (!method_exists($controllerObject, $this->actionName)) {
            $this->actionName = Config::Get('DEFAULT_ACTION');
        }
        $action = $this->actionName;
        $controllerObject->$action(Router::GetActionParameters());
    }
}