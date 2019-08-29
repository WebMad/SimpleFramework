<?php


namespace app\framework\database\queryBuilder;


/**
 * Class Join
 * @package app\framework\database\queryBuilder
 */
class Join
{
    protected $table;
    protected $on;
    protected $type = 'LEFT';
    /**
     * @var SelectQuery || InsertQuery
     */
    protected $parent;

    public function __construct($type, $table, $parent)
    {
        $this->table = $table;
        $this->type = $type;
        $this->parent = $parent;
    }

    public function on($field, $operator, $value)
    {
        $this->on = $field . $operator . $value;
        return $this->parent;
    }

    public function build()
    {
        $sql = $this->type . " JOIN " . $this->table . ' ON ' . $this->on;
        return $sql;
    }

}