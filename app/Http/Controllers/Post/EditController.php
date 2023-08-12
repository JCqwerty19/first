<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke()
    {
        return view('posts.edit');
    }
}
