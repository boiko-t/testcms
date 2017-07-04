<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 18.06.2017
 * Time: 13:01
 */

namespace application\models;

use application\core\ModelBase;

class User extends ModelBase
{
    protected $userId;
    protected $username;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $password;
    protected $role;
    protected $pictureUrl;
    protected $registrationDate;
    protected $token;


    function __construct()
    {
        $this->role = 1;
    }

    public function VerifyPassword($password)
    {
        return password_verify($password, $this->password);
    }

    public static function ValidatePassword($password)
    {
        return strlen($password) >= 4;
    }

    public static function ValidateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function GenerateToken()
    {
        $this->token = md5(uniqid(rand(), true));
    }

    public static function HashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}