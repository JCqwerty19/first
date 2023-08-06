<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        $posts = Post::where('category_id', $category->id);
        
        $variabels = [
            'posts' => $posts->paginate(10),
            'categories' => Category::all(),
            'category' => $category,
            'tags' => Tag::all(),
        ];

        return view('categories.index', $variabels);
    }
}
