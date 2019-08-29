<?php


namespace app\framework\database\migration;


interface IMigration
{


    /**
     * This method contains the logic to be executed when applying this migration.
     * @return bool
     */
    public function up();


    /**
     * This method contains the logic to be executed when removing this migration.
     * @return bool
     */
    public function down();
}