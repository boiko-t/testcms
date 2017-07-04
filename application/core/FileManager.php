<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 26.06.2017
 * Time: 14:37
 */

namespace application\core;


class FileManager
{
    public static function SaveImage($baseName, $uploadName)
    {
        $filename = $_FILES[$baseName]["name"];
        $extension = end(explode(".", $filename));
        $newFilename =$_SERVER['DOCUMENT_ROOT'] .'\\'. Config::Get('IMG_DIR') . $uploadName . '.' . $extension;
        $res = move_uploaded_file($_FILES[$baseName]['tmp_name'], $newFilename);
        if($res)
            return $uploadName . '.' . $extension;
        else return null;
    }

    public static function GetImageHtmlPath($imgName)
    {
        return '\\'. Config::Get('IMG_DIR') . $imgName;
    }
}