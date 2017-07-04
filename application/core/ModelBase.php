<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 13.06.2017
 * Time: 21:14
 */

namespace application\core;


abstract class ModelBase
{
    function __construct()
    {
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

    public function getProperties()
    {
        return array_keys(get_object_vars($this));
    }

    public function __get($fieldName)
    {
        $methodName = 'Get' . ucfirst($fieldName);
        if (method_exists($this, $methodName)) {
            return $this->$methodName();
        } else if (property_exists($this, $fieldName)) {
            return $this->{$fieldName};
        }
        return null;
    }

    public function __set($fieldName, $value)
    {
        if (property_exists($this, $fieldName)) {
            return $this->{$fieldName} = $value;
        }
        return $this;
    }

    function __isset($fieldName)
    {
        return property_exists($this, $fieldName);
    }
}