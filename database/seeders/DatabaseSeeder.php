<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Like;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)->create();
        $posts = Post::factory(200)->create();
        Comment::factory(500)->create();
        Like::factory(500)->create();
        $tags = Tag::factory(30)->create();

        foreach($posts as $post)
        {
            $tagId = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagId);
        }

        dd('done');
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
