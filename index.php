<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 13.06.2017
 * Time: 20:50
 */
spl_autoload_extensions(".php");
spl_autoload_register();
new \application\core\Application();