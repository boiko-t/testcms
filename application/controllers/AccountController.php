<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 21.06.2017
 * Time: 12:21
 */

namespace application\controllers;


use application\core\Auth;
use application\core\ControllerBase;
use application\core\ModelBinder;
use application\core\Redirect;
use application\core\Request;
use application\core\Session;
use application\core\View;
use application\core\ViewParametersManager;
use application\models\User;
use application\models\viewmodels\LoginViewModel;
use application\models\viewmodels\RegistrationViewModel;
use application\models\UserService;

class AccountController extends ControllerBase
{
    function __construct()
    {
        $this->service = new UserService();
        $this->view = new View('account');
    }

    public function Index()
    {
        $model = $this->service->GetById(Auth::CurrentUserId());
        $this->RenderPartialView('index', $model);
    }

    public function Edit()
    {
        if (Request::IsMethodPost()) {
            $user = new User();
            $model = new RegistrationViewModel();
            ModelBinder::BindModelFromForm($model);
            ModelBinder::BindFromViewModel($model, $user);
            $user->userId = Auth::CurrentUserId();
            $this->service->Edit($user);
            Redirect::To('/account');
        } else {
            $model = $this->service->GetById(Auth::CurrentUserId());
            $this->RenderPartialView('edit', $model);
        }
    }

    public function Delete()
    {
        if (Request::IsMethodPost()) {
            $this->service->DeleteById(Auth::CurrentUserId());
        } else {
            $this->RenderPartialView('delete');
        }
    }

    public function Login()
    {
        if (Request::IsMethodPost()) {
            $model = new LoginViewModel();
            ModelBinder::BindModelFromForm($model);
            $res = $this->service->Login($model);
            if (!$res){
                $error = array('error' => $this->service->errors);
                $this->RenderPartialView('login', ViewParametersManager::MergeModelAndArray($model, $error));
                return;
            }
            Redirect::Home();
        } else {
            $this->RenderPartialView('login');
        }
    }

    public function Register()
    {
        if (Request::IsMethodPost()) {
            $model = new RegistrationViewModel();
            ModelBinder::BindModelFromForm($model);
            $res = $this->service->Register($model);
            if (!$res){
                $error = array('error' => $this->service->errors);
                $this->RenderPartialView('register', ViewParametersManager::MergeModelAndArray($model, $error));
                return;
            }
            Redirect::Home();
        } else {
            $this->RenderPartialView('register');
        }
    }

    public function Logout()
    {
        $this->service->Logout();
    }
}