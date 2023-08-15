<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Tag;

class TagController extends BaseController
{
    public function __invoke(Tag $tag)
    {
        $variables =
        [
            'tag' => $tag,
            'posts' => $tag->posts,
        ];

        

        return view('tags.index', $variables);
    }
}