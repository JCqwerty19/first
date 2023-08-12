<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store($data)
    {
        $user = $data['user'];
        $tags = $data['tags'];
        unset($data['user']);
        unset($data['tags']);

        $post = Post::create($data);

        $post->user()->attach($user);
        $post->tags()->attach($tags);
    }

    public function update($post, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
    }

    public function like($post)
    {
        $data =
        [
            'likes' => $post->likes + 1,
        ];

        $post->update($data);
    }

    public function destroy($post)
    {
        $post->delete();
    }
}