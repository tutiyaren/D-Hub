<?php

namespace Database\Seeders;

use App\Models\Favorite_Debate;
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
        // \App\Models\User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(AnonymitiesTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(DebatesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(Favorites_DebatesTableSeeder::class);
    }
}
