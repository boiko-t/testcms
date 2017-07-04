<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 14.06.2017
 * Time: 13:35
 */

namespace application\controllers;

use application\core\ControllerBase;
use application\core\FileManager;
use application\core\ModelBinder;
use application\core\ModelMapper;
use application\core\Redirect;
use application\core\Request;
use application\core\Session;
use application\core\View;
use application\models\MagazinePreviewService;
use application\models\Mail;
use application\models\UserService;

class HomeController extends ControllerBase
{
    function __construct()
    {
        $this->view = new View('home');
    }

    public function Index()
    {
        $model = MagazinePreviewService::InitPreview();
        $this->RenderPartialView('index', $model);
    }

    public function Contact()
    {
        if(Request::IsMethodGet())
            $this->RenderPartialView('contact');
        else{
            $mailer = new Mail();
            ModelBinder::BindModelFromForm($mailer);
            $mailer->SendEmailToAdmin();
            Redirect::Home();
        }
    }
}