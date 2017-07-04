<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 17.06.2017
 * Time: 12:59
 */

namespace application\core;


use PDOStatement;

class ModelMapper
{
    protected $tableName;
    protected $primaryKey;
    protected $modelClassName;
    protected $db;

    public function __construct($tableName, $modelClassName, $primaryKey=null)
    {
        $this->tableName = $tableName;
        $this->modelClassName = $modelClassName;
        $this->primaryKey = isset($primaryKey) ? $primaryKey : $this->DefaultPk();
        $this->db = DbProvider::getInstance();
    }

    public function RunQuery($sql)
    {
        $statement = $this->db->execute($sql);
        try{
            $res = $statement->fetchAll(\PDO::FETCH_CLASS, $this->modelClassName);
        }catch (\PDOException $ex){
            $res = $statement->rowCount();
        }
        return $res;
    }

    public static function RunStatic($sql)
    {
        $statement = DbProvider::getInstance()->execute($sql);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function Create($model)
    {
        $data = $this->GetFilledModelDataArray($model);
        unset($data[$this->primaryKey]);
        $fieldsArray = array_keys($data);
        $valuesArray = array_values($data);
        $fieldsList = implode(', ', $fieldsArray);
        $valuesList = "'" . implode("', '", $valuesArray) . "'";
        $sql = "INSERT INTO {$this->tableName}($fieldsList) VALUES($valuesList)";
        $statement = $this->db->execute($sql);
        return $this->db->lastInsertId();
    }

    public function Update($model)
    {
        $id = $model->{$this->primaryKey};
        $where = "$this->primaryKey = $id";
        $data = $this->GetFilledModelDataArray($model);
        $setString = '';
        foreach ($data as $key => $value) {
            $setString = $setString . "{$key} = '{$value}', ";
        }
        $setString = rtrim($setString, ', ');
        $sql = "UPDATE {$this->tableName} SET {$setString} WHERE {$where}";
        $this->db->execute($sql);
    }

    public function GetById($id)
    {
        $where = "$this->primaryKey = $id";
        $sql = "SELECT * FROM {$this->tableName} WHERE $where";
        $statement = $this->db->execute($sql);
        $res = $statement->fetchAll(\PDO::FETCH_CLASS, $this->modelClassName);

        return $res[0];
    }

    public function DeleteById($id)
    {
        $where = "$this->primaryKey = $id";
        $sql = "DELETE FROM {$this->tableName} WHERE $where";
        $this->db->execute($sql);
    }

    private function GetModelDataArray(ModelBase $model)
    {
        return $model->toArray();
    }

    private function GetFilledModelDataArray(ModelBase $model)
    {
        $data = $this->GetModelDataArray($model);
        foreach ($data as $key => $val) {
            if (empty($val))
                unset($data[$key]);
        }
        return $data;
    }

    private function DefaultPk()
    {
        return substr_replace($this->tableName, "", -1) . 'Id';
    }
}