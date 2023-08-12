<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tag;

class TagController extends BaseController
{
    public function __invoke(Tag $tag)
    {
        $variables = [
            'posts' => $tag->posts,
        ];

        return view('tags.index', 'posts');
    }
}