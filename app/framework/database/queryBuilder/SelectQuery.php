<?php


namespace app\framework\database\queryBuilder;


use app\framework\database\DB;

/**
 * Class SelectQuery
 * @package app\framework\database\queryBuilder
 */
class SelectQuery extends Query
{
    protected $where;
    /**
     * @var
     */
    protected $fields;
    /**
     * @var Join[]
     */
    protected $joins;

    public function where($field, $operator, $value)
    {
        $this->where = $field . $operator . $value;
        return $this;
    }

    public function fields($fields)
    {
        $this->fields = implode(',', $fields);
        return $this;
    }

    public function leftJoin($table)
    {
        $join = new Join('LEFT', $table, $this);
        $this->joins[] = $join;
        return $join;
    }

    public function innerJoin($table)
    {
        $join = new Join('INNER', $table, $this);
        $this->joins[] = $join;
        return $join;
    }

    public function rightJoin($table)
    {
        $join = new Join('RIGHT', $table, $this);
        $this->joins[] = $join;
        return $join;
    }

    public function execute()
    {
        $fields = ($this->fields) ? $this->fields : '*';
        $sql = "SELECT $fields FROM {$this->tableName}";
        if (isset($this->joins)) {
            foreach ($this->joins as $join) {
                $sql .= ' ' . $join->build();
            }
        }
        if ($this->where) {
            $sql .= ' WHERE ' . $this->where;
        }
        $res = DB::execute($sql);
        return $res;
    }
}