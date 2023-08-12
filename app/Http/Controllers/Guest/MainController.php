<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class MainController extends Controller
{
    public function __invoke()
    {
        $posts = Post::all();
        return view('guests.main', $posts);
    }
}
