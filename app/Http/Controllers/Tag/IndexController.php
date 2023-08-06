<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class IndexController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $variables = [
            'posts' => $tag->posts()->paginate(10),
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'tag' => $tag,
        ];

        return view('tags.index', $variables);
    }
}
