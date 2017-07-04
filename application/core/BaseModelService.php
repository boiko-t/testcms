<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 21.06.2017
 * Time: 19:07
 */

namespace application\core;


interface BaseModelService
{
    public function GetById($id);
    public function Create(ModelBase $model);
    public function DeleteById($id);
    public function Edit(ModelBase $model);
}