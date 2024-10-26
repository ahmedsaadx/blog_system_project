<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateUsersTable extends AbstractMigration
{
    public function change()
    {
        if (!$this->hasTable('users')) {
            $table = $this->table('users', [
                'id' => 'id',
                'engine' => 'InnoDB'
            ]);

            $table->addColumn('name', 'string', ['limit' => 255, 'null' => false])
                  ->addColumn('email', 'string', ['limit' => 100, 'null' => false])
                  ->addColumn('password', 'string', ['limit' => 255, 'null' => false])
                  ->addColumn('roles', 'enum', ['values' => ['admin', 'user'], 'default' => 'user'])
                  ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                  ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
                  ->addIndex(['email'], ['unique' => true])
                  ->create();
        }
    }
}
