<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    public function run(): void
{
    // Clear old data
    DB::table('posts')->truncate();
    DB::table('users')->truncate();

    // Then create new users and posts
    User::factory()->count(5)->create();
    Post::factory()->count(20)->create();
}
}
