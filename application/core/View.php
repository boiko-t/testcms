<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 13.06.2017
 * Time: 21:15
 */

namespace application\core;

class View
{
    private $directoryName;

    function __construct($moduleName = 'home')
    {
        $this->directoryName = Config::Get('VIEWS_BASEDIR') . "\\$moduleName\\";
    }

    protected function fetchToLayout($template, $params)
    {
        $content = $this->fetchPartial($template, $params);
        return $this->fetchPartial(Config::Get('BASE_LAYOUT'), array('content' => $content));
    }

    protected function fetch($template, $params)
    {
        return $this->fetchPartial($template, $params);
    }

    protected function fetchPartial($template, $params)
    {
        extract($params);
        ob_start();
        include $template;
        return ob_get_clean();
    }

    public function renderPartial($template, $params = array())
    {
        $params = ViewParametersManager::ValidateParams($params);
        $template = $this->directoryName . $template . '.php';
        echo $this->fetchToLayout($template, $params);
    }

    public function render($template, $params = array())
    {
        $params = ViewParametersManager::ValidateParams($params);
        $template = $this->directoryName . $template . '.php';
        echo $this->fetch($template, $params);
    }
}