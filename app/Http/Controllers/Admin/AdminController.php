<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Redirections;
use App\Models\RedirectionsStatistics;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function index()
    {
        $redirections = Redirections::with('statistics')->get()->sortByDesc('statistics.usage')->take(10);
        $users = User::orderBy('created_at', 'DESC')->get()->take(4);
        return view('admin.index')->with('redirections', $redirections)->with('users', $users);
    }
}
