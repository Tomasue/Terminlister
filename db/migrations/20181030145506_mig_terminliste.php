<?php


use Phinx\Migration\AbstractMigration;

class MigTerminliste extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {

        $this->table('terminliste')
             ->addColumn('date_start', 'date')
             ->addColumn('date_end', 'date')
             ->addColumn('time_start', 'time')
             ->addColumn('time_end', 'time')
             ->addColumn('hoved', 'boolean', ['default' => 0])
             ->addColumn('junior', 'boolean', ['default' => 0])
             ->addColumn('aspirant', 'boolean', ['default' => 0])
             ->addColumn('description', 'string', ['limit' => 256])
             ->create();

    }
}
