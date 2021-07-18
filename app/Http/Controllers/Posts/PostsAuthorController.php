<?php

namespace App\Http\Controllers\Posts;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;

class PostsAuthorController extends Controller
{
    public function index(User $user) {
        $posts = Posts::where('user_id', 'like', '%' . $user->id . '%')
            ->orderByDesc('created_at')
            ->paginate(12);

        return view('posts.postsAuthor')->with('posts', $posts)->with('author', $user);
    }

}
