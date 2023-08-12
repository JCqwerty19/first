<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class MainController extends Controller
{
    public function __invoke()
    {
        $variables =
        [
            'posts' => Post::all(),
        ];

        return view('site.main', $variables);
    }
}
