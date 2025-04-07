<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

     public function run(): void
{
    // Disable foreign key checks
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    // Truncate related tables first
    DB::table('post_tags')->truncate();
    DB::table('posts')->truncate();
    DB::table('users')->truncate();

    // Re-enable foreign key checks
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    // Seed fresh data
    User::factory()->count(5)->create();
    Post::factory()->count(20)->create();
}

}
