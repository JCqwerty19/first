<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Post\BaseController;
use Illuminate\Http\Request;

use App\Models\Comment;

class DestroyController extends BaseController
{
    public function __invoke(Comment $comment)
    {
        $this->service->destroyComment($comment);

        return back();
    }
}
