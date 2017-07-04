<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 22.06.2017
 * Time: 13:57
 */

namespace application\models\viewmodels;


use application\core\ModelBase;

class LoginViewModel extends ModelBase
{
    protected $username;
    protected $password;
    protected $rememberMe;
}