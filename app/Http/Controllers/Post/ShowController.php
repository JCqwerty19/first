<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class ShowController extends BaseController
{
    public function __invoke()
    {
        $variables = [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ];

        return view('posts.show', $variables);
    }
}