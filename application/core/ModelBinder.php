<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 21.06.2017
 * Time: 12:18
 */

namespace application\core;


class ModelBinder
{
    public static function BindModelFromForm(ModelBase $model)
    {
        foreach ($model->getProperties() as $key){
            $model->$key = Request::Post($key);
        }
    }

    public static function BindFromViewModel(ModelBase $src, ModelBase $output)
    {
        foreach ($src->getProperties() as $key){
            if(isset($output->$key))
                $output->$key = $src->$key;
        }
    }
}