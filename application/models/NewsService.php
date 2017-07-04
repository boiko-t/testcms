<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 23.06.2017
 * Time: 17:31
 */

namespace application\models;


use application\core\BaseModelService;
use application\core\DbProvider;
use application\core\FileManager;
use application\core\ModelBase;
use application\core\ModelMapper;

class NewsService implements BaseModelService
{
    protected $news;
    protected $mapper;
    public $errors;

    function __construct()
    {
        $this->user = new News();
        $this->mapper = new ModelMapper('news', 'application\models\News', 'newsId');
    }

    public function GetById($id)
    {
        $model = $this->mapper->GetById($id);
        $model->newsText = str_replace("\'", "'", $model->newsText);
        return $model;
    }

    public function GetAll()
    {
        $sql = 'SELECT * FROM news';
        return $this->mapper->RunQuery($sql);
    }

    public function Create(ModelBase $model)
    {
        $model->newsText = str_replace("'", "\'", $model->newsText);
        $model->newsId = $this->mapper->Create($model);
        $this->ChangePicture($model,'pictureUrl', $model->newsId);
        return $model->newsId;
    }

    public function DeleteById($id)
    {
        $this->mapper->DeleteById($id);
    }

    public function Edit(ModelBase $model)
    {
        $this->mapper->Update($model);
    }

    public function ChangePicture($model, $baseName, $newUrl)
    {
        $newUrl = FileManager::SaveImage($baseName, $newUrl);
        $sql = "UPDATE news SET pictureUrl = '$newUrl' WHERE newsId = '$model->newsId'";
        $this->mapper->RunQuery($sql);
    }
}