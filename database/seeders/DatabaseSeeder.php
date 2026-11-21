<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProductSeeder::class,
            CustomerSeeder::class,
        ]);

        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@bagelengoo.test',
            'password' => bcrypt('admin123'),
        ]);
    }
}