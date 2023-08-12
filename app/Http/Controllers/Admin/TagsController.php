<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tag;

class TagsController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::all();
        return view('admin.tags', 'tags');
    }
}
