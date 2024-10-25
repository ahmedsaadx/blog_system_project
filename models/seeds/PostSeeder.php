<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Faker\Factory as Faker;

final class PostSeeder extends AbstractSeed
{
    public function run(): void
    {
        $faker = Faker::create();

        // Fetch existing user IDs
        $users = $this->fetchAll('SELECT id FROM users');
        $userIds = array_column($users, 'id');

        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title'      => $faker->sentence,
                'content'    => $faker->paragraph,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'user_id'    => $faker->numberBetween(1,10), 
                'category_id'=> $faker->numberBetween(1, 5), 
            ];
        }

        $this->table('posts')->insert($data)->saveData();
    }
}