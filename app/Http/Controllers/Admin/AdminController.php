<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use App\Models\RedirectionStatistics;
use App\Models\Redirections;
use App\Models\User;
use App\Models\Posts;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function index()
    {
        $redirections = Redirections::all();
        $redirectionStatistics = RedirectionStatistics::orderByDesc('updated_at')->get();
        $users = User::orderByDesc('created_at')->get();
        $posts = Posts::orderByDesc('created_at')->get();
        return view('admin.index')->with('redirections', $redirections)->with('redirectionStatistics', $redirectionStatistics)->with('users', $users)->with('posts', $posts);
    }
}
