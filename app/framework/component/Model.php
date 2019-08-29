<?php


namespace app\framework\component;


use app\framework\database\migration\Field;
use app\framework\database\migration\Migration;

/**
 * Class Model
 * @package app\framework\component
 */
abstract class Model extends DB
{
    /**
     * Table name
     * @var string
     */
    public $tableName;
    /**
     * All fields
     * @var array
     */
    public $fields;
    /**
     * Fillable fields
     * @var array
     */
    public $fillable;
    /**
     * Need timestamp columns
     * @var bool
     */

    protected $table;

    public $timestamp = true;

    public function __construct()
    {
        $this->tableName = __CLASS__;
        $this->table = new Migration($this->table);
    }

    public function migrate()
    {
        $this->table->addColumn('id', 'integer')->length(11)->primary();

        $this->migrate();
    }

}