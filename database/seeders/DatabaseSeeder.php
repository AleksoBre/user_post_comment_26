<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $users = User::factory(10)->create();
        $tags = Tag::factory(10)->create();
        $posts = Post::factory(100)->recycle($users)->hasAttached($tags)->create();
        Comment::factory(600)->recycle($posts)->create();

    }
}
