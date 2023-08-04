<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store($data)
    {
        $tags = $data('tags');
        unset($data['tags']);

        $post = Post::firstOrCreate($data);
        $post->tags()->attach($tags);
    }

    public function update($data)
    {
        $tags = $data(['tags']);
        unset($data['tags']);

        $post->firstOrUpdate($data);
        $post->tags()->sync($tags);
    }

    public function destroy($post)
    {
        $post->delete();
    }
}