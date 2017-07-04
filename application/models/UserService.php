<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 21.06.2017
 * Time: 19:04
 */

namespace application\models;

use application\core\BaseModelService;
use application\core\ModelBase;
use application\core\ModelBinder;
use application\core\ModelMapper;
use application\core\Redirect;
use application\core\Session;
use application\models\viewmodels\LoginViewModel;
use application\models\viewmodels\RegistrationViewModel;

class UserService implements BaseModelService
{
    protected $user;
    protected $mapper;
    public $errors;

    function __construct()
    {
        $this->user = new User();
        $this->mapper = new ModelMapper('users', 'application\models\User');
    }

    public function Login(LoginViewModel $loginModel)
    {
        ModelBinder::BindFromViewModel($loginModel, $this->user);
        $query = "SELECT * FROM users WHERE username = '$loginModel->username'";
        $this->user = $this->mapper->RunQuery($query)[0];
        if(empty($this->user)){
            $this->errors = 'Incorrect username';
            return false;
        }

        if(!$this->user->VerifyPassword($loginModel->password)){
            $this->errors = 'Incorrect password';
            return false;
        }

        if($loginModel->rememberMe){
            $this->user->GenerateToken();
            $this->mapper->Update($this->user);
            Session::RememberUser($this->user);
        }

        Session::LoginUser($this->user);
        return true;
    }

    public function Logout()
    {
        Session::Destroy();
        Redirect::Home();
    }

    public function Register(RegistrationViewModel $registerModel)
    {
        $query = "SELECT * FROM users WHERE username = '$registerModel->username'";
        $dbRes = $this->mapper->RunQuery($query)[0];
        if(!empty($dbRes)){
            $this->errors = 'Username is already taken';
            return false;
        }
        $passwordMatchResult = $registerModel->CheckPasswordMatching();
        if($passwordMatchResult){
            $this->errors = $passwordMatchResult;
            return false;
        }
        if(!User::ValidateEmail($registerModel->email)){
            $this->errors = 'Please enter a valid email address';
            return false;
        }
        if(!User::ValidatePassword($registerModel->password)){
            $this->errors = 'Please enter a valid password. The password should be longer than 4 characters';
            return false;
        }

        $registerModel->password = User::HashPassword($registerModel->password);
        ModelBinder::BindFromViewModel($registerModel, $this->user);
        $id = $this->mapper->Create($this->user);
        $this->user->userId = $id;
        Session::LoginUser($this->user);
        return true;
    }

    public function GetById($id)
    {
        return $this->mapper->GetById($id);
    }

    public function Create(ModelBase $model)
    {
        // TODO: Implement create() method.
    }

    public function DeleteById($id)
    {
        $this->mapper->DeleteById($id);
        Session::Destroy();
        Session::CleanCookie();
    }

    public function Edit(ModelBase $model)
    {
        $this->mapper->Update($model);
    }
}