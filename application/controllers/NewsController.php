<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 26.06.2017
 * Time: 2:25
 */

namespace application\controllers;


use application\core\Auth;
use application\core\ControllerBase;
use application\core\FileManager;
use application\core\ModelBinder;
use application\core\Redirect;
use application\core\Request;
use application\core\View;
use application\models\CategoriesService;
use application\models\News;
use application\models\NewsService;

class NewsController extends ControllerBase
{
    function __construct()
    {
        $this->service = new NewsService();
        $this->view = new View('news');
    }

    public function Index()
    {
        if (Request::IsMethodGet()) {
            $modelsArray = $this->service->GetAll();
            foreach ($modelsArray as $elem) {
                $elem->pictureUrl = FileManager::GetImageHtmlPath($elem->pictureUrl);
            }
            $this->RenderPartialView('index', array('news' => $modelsArray));
        }
    }

    public function Create()
    {
        if (!Auth::IsUserAdmin()) {
            $error = new ErrorController();
            $error->AccessError();
            return;
        }
        if (Request::IsMethodPost()) {
            $model = new News();
            ModelBinder::BindModelFromForm($model);
            $model->authorId = Auth::CurrentUserId();
            $newId = $this->service->Create($model);
            Redirect::To("/news/read/$newId");
        } else {
            $categories = CategoriesService::GetCategoriesList();
            $this->RenderPartialView('create', array('categories' => $categories));
        }
    }

    public function Read($id)
    {
        if (Request::IsMethodGet()) {
            $model = $this->service->GetById($id);
            $model->pictureUrl = FileManager::GetImageHtmlPath($model->pictureUrl);
            $this->RenderPartialView('read', $model);
        }
    }

    public function Delete($id)
    {
        if (Request::IsMethodGet()) {
            $this->service->DeleteById($id);
            Redirect::To('/news');
        }
    }
}