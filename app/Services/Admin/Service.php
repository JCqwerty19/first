<?php

namespace App\Services\Admin;

class Service
{
    public function userDestroy($user)
    {
        $posts = $user->posts;
        $comments = $user->comments;

        foreach($posts as $post)
        {
            $post->delete();
        }

        foreach($comments as $comment)
        {
            $comment->delete();
        }

        $user->delete();

    }

    public function tagDestroy($tag)
    {
        $tag->delete();
    }
}