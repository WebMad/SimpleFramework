<?php


namespace app\framework\database\queryBuilder;


class QueryConstructor
{
    // create delete update get
    protected $tableName;
    protected $sql;

    public function __construct($table)
    {
        $this->tableName = $table;
    }

    public function insert($fields)
    {
        return new InsertQuery();
    }

    public function select($fields = null)
    {
        $select = new SelectQuery($this->tableName);
        if ($fields) {
            $select->fields($fields);
        }
        return $select;
    }

}