<?php

namespace App\Services\Post;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;

class Service
{
    public function store($data)
    {
        $data['user_id'] = auth()->user()->id;
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

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
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
        ];

        Like::create($data);
    }

    public function unlike($like)
    {
        $like->delete();
    }

    public function comment($post, $data)
    {
        $data['post_id'] = $post->id;
        $data['user_id'] = auth()->user()->id;
        
        Comment::create($data);
        
    }

    public function destroy($post)
    {
        $post->delete();
    }
}