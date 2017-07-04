<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 25.06.2017
 * Time: 0:49
 */

namespace application\core;


class ViewParametersManager
{
    public static function ValidateParams($params)
    {
        if(is_array($params)){
            foreach ($params as $key => $value){
                if ($value instanceof ModelBase)
                    $params[$key] = $value->toArray();
            }
        }
        if ($params instanceof ModelBase)
            return $params->toArray();
        if (!isset($params))
            $params = array();
        return $params;
    }

    public static function MergeModelAndArray(ModelBase $model, $arr)
    {
        return array_merge($model->toArray(), $arr);
    }
}