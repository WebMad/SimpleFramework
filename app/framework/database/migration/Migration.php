<?php


namespace app\framework\database\migration;


use app\framework\database\DB;
use PDO;

/**
 * Class Migration
 * @package app\framework\database\migration
 */
class Migration implements IMigration
{
    private $table;

    /**
     * Db driver
     * @var
     */

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function addColumn($name, $type)
    {

        return new Field($name, $type);
    }

    /**
     * @param $name string
     * @param $fields Field[]
     */
    public function createTable($name, $fields)
    {
        $columns = '';

        foreach ($fields as $field) {
            $columns .= $field->getColumnSql() . ',';
        }
        //DB::execute(''); //сюда передаем sql запрос который необзодиио выполнить
    }

    /**
     * This method contains the logic to be executed when applying this migration.
     * @return bool
     */
    public function up()
    {
    }

    /**
     * This method contains the logic to be executed when removing this migration.
     * @return bool
     */
    public function down()
    {
    }
}