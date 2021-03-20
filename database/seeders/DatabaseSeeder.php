<?php

namespace Database\Seeders;

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
        \App\Models\Role::factory(2)->create();
        \App\Models\Story::factory(15)->create();
        \App\Models\Tag::factory(2)->create();
    }
}