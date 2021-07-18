<?php

namespace App\Http\Controllers\Posts;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;

class PostsTagController extends Controller
{
    public function index($tag) {
        $posts = Posts::where('tags', 'like', '%' . $tag . '%')
            ->orderByDesc('created_at')
            ->paginate(12);

        return view('posts.postsTag')->with('posts', $posts)->with('tag', $tag);
    }

}
