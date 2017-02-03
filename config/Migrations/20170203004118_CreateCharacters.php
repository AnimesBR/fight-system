<?php
use Migrations\AbstractMigration;

class CreateCharacters extends AbstractMigration
{

    public $autoId = false;

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('characters');
        $table->addColumn('id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('user_id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 25,
            'null' => false,
        ]);
        $table->addColumn('description', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('attack', 'integer', [
            'default' => 5,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('defense', 'integer', [
            'default' => 5,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('mobility', 'integer', [
            'default' => 5,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('health', 'integer', [
            'default' => 5,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('energy', 'integer', [
            'default' => 5,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('level', 'integer', [
            'default' => 1,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('experience', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('experience_needed', 'integer', [
            'default' => 100,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addPrimaryKey([
            'id',
        ]);
        $table->create();
    }
}
