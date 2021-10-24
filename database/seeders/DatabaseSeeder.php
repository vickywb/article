<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
        ]);

        User::factory(5)->create();
        Article::factory(16)->create();
    }
}
