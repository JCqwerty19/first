<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $variables =
        [
            'tags' => Tag::all(),
        ];

        return view('posts.create', $variables);
    }
}