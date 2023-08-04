<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $variables = [
            'posts' => Post::pagenate(10),
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ];

        return view('posts.index');
    }
}