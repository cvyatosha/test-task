<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Image;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::factory(1)->create();
        Image::factory()->count(10)->create();
    }
}
