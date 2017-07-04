<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 26.06.2017
 * Time: 11:37
 */

namespace application\models;


use application\core\BaseModelService;
use application\core\ModelBase;
use application\core\ModelMapper;

class CategoriesService implements BaseModelService
{
    protected $category;
    protected $mapper;
    public $errors;

    function __construct()
    {
        $this->category = new Category();
        $this->mapper = new ModelMapper('categories', 'application\models\Category', 'categoryId');
    }

    public function GetById($id)
    {
        // TODO: Implement GetById() method.
    }

    public function Create(ModelBase $model)
    {
        // TODO: Implement Create() method.
    }

    public function DeleteById($id)
    {
        // TODO: Implement DeleteById() method.
    }

    public function Edit(ModelBase $model)
    {
        // TODO: Implement Edit() method.
    }

    public static function GetCategoriesList()
    {
        $sql = 'SELECT categoryId, name FROM categories';
        return ModelMapper::RunStatic($sql);
    }
}