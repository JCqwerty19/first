<?php

namespace App\Services\Post;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;

class Service
{
    // Create post
    public function store($data)
    {
        $data['user_id'] = auth()->user()->id;
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);
    }

    
    // Update post
    public function update($post, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
    }


    // Like post
    public function like($post)
    {
        $data =
        [
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
        ];

        Like::create($data);
    }


    // Restrict like
    public function unlike($like)
    {
        $like->delete();
    }


    // Comment post
    public function comment($post, $data)
    {
        $data['post_id'] = $post->id;
        $data['user_id'] = auth()->user()->id;
        
        Comment::create($data);
        
    }


    // Delete comment
    public function destroyComment($comment)
    {
        $comment->delete();
    }


    // Delete post
    public function destroy($post)
    {
        $post->delete();
    }
}