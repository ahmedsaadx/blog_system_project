<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Faker\Factory as Faker;

class UserSeeder extends AbstractSeed
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
                'password'  => password_hash('password123', PASSWORD_DEFAULT),
                'roles'     => 'user',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $this->table('users')->insert($data)->saveData();
    }
}
