<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $postCount     = Post::count();
        $userCount     = User::count();
        $categoryCount = Category::count();

        return view('backend.dashboard', compact('postCount', 'userCount', 'categoryCount'));
    }
}
