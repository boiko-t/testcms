<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 23.06.2017
 * Time: 0:19
 */

namespace application\models;


use application\core\ModelBase;

class News extends ModelBase
{
    protected $newsId;
    protected $title;
    protected $newsText;
    protected $authorId;
    protected $creationDate;
    protected $categoryId;
    protected $pictureUrl;

}