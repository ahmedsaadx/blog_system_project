<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Faker\Factory as Faker;

class MessageSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $faker = Faker::create();
        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name'      => $faker->name,
                'email'     => $faker->email,
                'subject'   => $faker->sentence(6),
                'content'   => $faker->paragraph(4),
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ];
        }

        $this->table('messages')->insert($data)->saveData();
    }

}

