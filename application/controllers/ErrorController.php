<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 15.06.2017
 * Time: 23:20
 */

namespace application\controllers;


use application\core\ControllerBase;
use application\core\View;

class ErrorController extends ControllerBase
{

    public function __construct()
    {
        $this->view = new View('error');
    }

    public function Error404()
    {
        $this->RenderView('404');
    }

    public function AccessError()
    {
        $this->RenderView('access');
    }
}