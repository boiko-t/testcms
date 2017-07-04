<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 13.06.2017
 * Time: 21:14
 */

namespace application\core;


abstract class ControllerBase
{
    protected $service;
    protected $view;
    protected $response;

    protected function RenderPartialView($name, $params = null)
    {
        $this->view->renderPartial($name, $params);
    }

    protected function RenderView($name, $params = null)
    {
        $this->view->render($name, $params);
    }
}