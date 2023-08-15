<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tag;

class TagDestroyController extends BaseController
{
    public function __invoke(Tag $tag)
    {
        $this->service->tagDestroy($tag);

        return back();
    }
}
