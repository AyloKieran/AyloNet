<?php

namespace App\Http\Controllers;

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
            ->paginate(25)
            ->withQueryString();

        return view('posts')->with('posts', $posts);
    }

}
