<?php
namespace libs;

class Db
{
    private static $_obj = null;
    private function __clone(){}
    private $pdo;
    private function __construct(){
        $this->pdo = new \PDO('mysql:host=localhost;dbname=jxshop','root','');
        $this->pdo->exec('set names utf8');
    }

    public static function make()
    {
        if(self::$_obj===null)
        {
            self::$_obj = new self;
        }
        return self::$_obj;
    }

    public function prepare($sql)
    {
       return $this->pdo->prepare($sql);
    }
}