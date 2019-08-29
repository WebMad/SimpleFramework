<?php


namespace app\framework\database;

use app\framework\database\queryBuilder\QueryConstructor;
use PDO;



class DB extends QueryConstructor
{
    /**
     * @var PDO
     */
    static private $db;
    /**
     * @var string
     */
    protected $tableName;

    /**
     * Init connection to database
     */
    static public function init()
    {
        self::$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }

    /**
     * Return PDO object
     * @return PDO
     */
    static public function getDb()
    {
        return self::$db;
    }

    /**
     * Init QueryConstructor
     * @param $name
     * @return QueryConstructor
     */
    static public function table($name)
    {
        return new QueryConstructor($name);
    }

    /**
     * Execute sql request
     * @param $sql
     * @param $params
     * @return bool|void
     */
    static public function execute($sql, $params = null)
    {
        $db = self::getDb();
        $res = $db->prepare($sql);
        $res->execute($params);
        $row = $res->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function __autoload(){

    }
}