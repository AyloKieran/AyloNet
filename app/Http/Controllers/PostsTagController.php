<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;

class PostsTagController extends Controller
{
    public function index($tag) {
        $posts = Posts::where('tags', 'like', '%' . $tag . '%')
            ->orderByDesc('created_at')
            ->paginate(25);

        return view('postsTag')->with('posts', $posts)->with('tag', $tag);
    }

}
