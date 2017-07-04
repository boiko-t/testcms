<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 13.06.2017
 * Time: 21:16
 */

namespace application\core;

use PDO;

class DbProvider
{
    private $pdo;
    private static $_instance = null;

    function __construct()
    {
        $this->pdo = new \PDO(Config::Get('DB_TYPE') . ':host=' . Config::Get('DB_HOST') . ';dbname=' .
            Config::Get('DB_NAME'), Config::Get('DB_LOGIN'), Config::Get('DB_PASSWORD'));
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function quote($str)
    {
        return $this->pdo->quote($str);
    }

    static public function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function execute($sql)
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement;
    }

    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }

    public function beginTransaction()
    {
        $this->pdo->beginTransaction();
        return $this;
    }


    public function commit()
    {
        $this->pdo->commit();
        return $this;
    }

    public function rollBack()
    {
        $this->pdo->rollBack();
        return $this;
    }
}