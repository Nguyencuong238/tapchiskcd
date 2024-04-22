<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectOldPostController extends Controller
{
    public function __invoke($slug, $id)
    {
        return redirect(route('front.posts.show', compact('slug', 'id')), 301);
    }
}
