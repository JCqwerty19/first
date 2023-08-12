<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class DestroyController extends Controller
{
    public function __invoke(Post $post)
    {
        $this->service->destroy($post);

        return redirect()->route('users.profile');
    }
}
