<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 22.06.2017
 * Time: 10:44
 */

namespace application\models\viewmodels;

use application\core\ModelBase;

class RegistrationViewModel extends ModelBase
{
    protected $username;
    protected $email;
    protected $firstName;
    protected $lastName;
    protected $password;
    protected $passwordConfirm;

    public function CheckPasswordMatching()
    {
        if(strcmp($this->password, $this->passwordConfirm))
            return 'Passwords do not match';
        return null;
    }
}
