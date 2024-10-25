<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateMessagesTable extends AbstractMigration
{
  
    public function change()
    {
        if (!$this->hasTable('messages')) {
            $table = $this->table('messages');
            $table->addColumn('name', 'string', ['limit' => 255])
                  ->addColumn('email', 'string', ['limit' => 100])
                  ->addColumn('subject', 'string', ['limit' => 255])
                  ->addColumn('content','text')
                  ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                  ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                  ->create();
            }
        }
    }

