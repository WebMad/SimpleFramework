<?php


namespace app\framework\database\migration;


/**
 * Class Field
 * @package app\framework\database\migration
 */
class Field
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $defaultValue;


    /**
     * @var int
     */
    private $length;

    /**
     * @var string
     */
    private $foreignKey;

    /**
     * @var string
     */
    private $foreignTable;

    /**
     * @var bool
     */
    private $nullable;

    /**
     * @var string
     */
    private $type;

    /**
     * @var bool
     */
    private $primary;

    /**
     * Field constructor.
     * @param $name
     * @param $type
     * @return Field
     */
    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
        return $this;
    }

    /**
     * @param $length
     * @return $this
     */
    public function length($length)
    {
        $this->length = $length;
        return $this;
    }


    /**
     * @param $value
     * @return Field
     */
    public function defaultValue($value)
    {
        $this->defaultValue = $value;
        return $this;
    }

    /**
     * @param $key
     * @param $table
     * @return $this
     */
    public function foreign($key, $table)
    {
        $this->foreignKey = $key;
        $this->foreignTable = $table;

        return $this;
    }

    public function primary($value = true) {
        $this->primary = $value;
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function nullable($value)
    {
        $this->nullable = $value;
        return $this;
    }

    public function getColumnSql()
    {
        $sql = $this->name . $this->type . "({$this->length}) ";
        if(!$this->nullable){
            $sql .= 'NOT NULL';
        }
        return $sql;
    }

    public function getForeignSql()
    {

    }

}