<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __invoke()
    {
        $variables =
        [
            'posts' => auth()->user()->posts()->get(),
        ];

        return view('users.page', $variables);
    }
}
