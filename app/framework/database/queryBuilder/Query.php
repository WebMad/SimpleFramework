<?php


namespace app\framework\database\queryBuilder;


abstract class Query
{
    protected $tableName;
    public function __construct($table)
    {
        $this->tableName = $table;
    }

}