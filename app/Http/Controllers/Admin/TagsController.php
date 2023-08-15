<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tag;

class TagsController extends Controller
{
    public function __invoke()
    {
        $variables =
        [
            'tags' => Tag::paginate(15),
        ];

        return view('admin.tags', $variables);
    }
}