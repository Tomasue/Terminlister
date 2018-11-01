<?php


use Phinx\Migration\AbstractMigration;

class MigSession extends AbstractMigration
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

        $this->table('sessions')
             ->addColumn('user_id', 'integer')
             ->addColumn('ip', 'string', ['limit' => 45])
             ->addColumn('user_agent', 'string', ['limit' => 255])
             ->addColumn('key', 'string', ['limit' => 128])
             ->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
             ->addIndex(['user_id', 'ip', 'user_agent'], ['unique' => true])
             ->addIndex('key', ['unique' => true])
             ->addForeignKey('user_id', 'users', 'id')
             ->create();

    }
}
