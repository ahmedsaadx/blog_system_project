<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatePostsTable extends AbstractMigration
{
    public function change()
    {
        if (!$this->hasTable('posts')) {
            $table = $this->table('posts', [
                'engine' => 'InnoDB'
            ]);

            $table->addColumn('title', 'string', ['limit' => 255, 'null' => false])
                  ->addColumn('content', 'text', ['null' => false])
                  ->addColumn('image_path', 'string', ['limit' => 255, 'null' => true])
                  ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                  ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
                  ->addColumn('user_id', 'unsignedInteger', ['null' => false]) 
                  ->addColumn('category_id', 'unsignedInteger', ['null' => false])
                  ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE', 'constraint' => 'fk_user'])
                  ->addForeignKey('category_id', 'categories', 'id', ['update' => 'CASCADE', 'constraint' => 'fk_category'])
                  ->create();
        }
    }
}
