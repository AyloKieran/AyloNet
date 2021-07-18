<?php

namespace App\Http\Controllers\Posts;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;

class PostsController extends Controller
{
    public function index() {
        $search = request()->input('search');

        $posts = Posts::where('title', 'like', '%' . $search . '%')
            ->orWhere('excerpt', 'like', '%' . $search . '%')
            ->orWhere('tags', 'like', '%' . $search . '%')
            ->orderByDesc('created_at')
            ->paginate(12)
            ->withQueryString();

        return view('posts.posts')->with('posts', $posts);
    }

}
