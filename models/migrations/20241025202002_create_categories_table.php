<?php

use Phinx\Migration\AbstractMigration;

class CreateCategoriesTable extends AbstractMigration
{
    public function change()
    {
        // Create the categories table
        $table = $this->table('categories');
        $table->addColumn('name', 'string', ['limit' => 255, 'null' => false])
              ->addIndex(['name'], ['unique' => true]) // Optional: to ensure category names are unique
              ->create();
    }
}
