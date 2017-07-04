<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 23.06.2017
 * Time: 0:19
 */

namespace application\models;

use application\core\ModelBase;

class Category extends ModelBase
{
    protected $categoryId;
    protected $name;
    protected $newsCount;
}