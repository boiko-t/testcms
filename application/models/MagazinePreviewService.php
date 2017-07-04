<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 25.06.2017
 * Time: 1:06
 */

namespace application\models;


use application\core\BaseModelService;
use application\core\ModelBase;
use application\core\ModelMapper;

class MagazinePreviewService
{
    public static function InitPreview():MagazinePreview
    {
        $model = new MagazinePreview();
        $model->popularCategories = ModelMapper::RunStatic('SELECT * FROM categories ORDER BY newsCount DESC LIMIT 5');
        $model->latestNews = ModelMapper::RunStatic('SELECT newsId, pictureUrl, title FROM news ORDER BY creationDate DESC LIMIT 3');
        $model->randomNews = ModelMapper::RunStatic('SELECT newsId, pictureUrl, title FROM news ORDER BY creationDate LIMIT 3');
        return $model;
    }
}