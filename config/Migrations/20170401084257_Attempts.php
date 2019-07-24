<?php
use Migrations\AbstractMigration;

class Attempts extends AbstractMigration
{

    public function up()
    {

        $this->table('answers')
            ->addColumn('correct', 'boolean', [
                'after' => 'completed_at',
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('answers')
            ->removeColumn('correct')
            ->update();
    }
}

