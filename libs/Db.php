<?php
namespace libs;

class Db
{
    private static $_obj = null;
    private function __clone(){}
    private $_pdo;
    private function __construct(){
        $this->_pdo = new \PDO('mysql:host=localhost;dbname=jxshop','root','123456');
        $this->_pdo->exec('set names utf8');
    }

    public static function make()
    {
        if(self::$_obj===null)
        {
            self::$_obj = new self;
        }
        return self::$_obj;
    }

    //预处理
    public function prepare($sql)
    {
       return $this->_pdo->prepare($sql);
    }

    // 非预处理执行SQL
    public function exec($sql)
    {
        return $this->_pdo->exec($sql);
    }

    // 获取最新添加的记录的ID
    public function lastInsertId()
    {
        return $this->_pdo->lastInsertId();
    }
}