<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class CategoriesSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            ['name' => 'Technology'],
            ['name' => 'Health'],
            ['name' => 'Lifestyle'],
            ['name' => 'Education'],
            ['name' => 'Travel'],
            ['name' => 'Food'],
            ['name' => 'Entertainment'],
        ];

        $this->table('categories')->insert($data)->saveData();
    }
}
