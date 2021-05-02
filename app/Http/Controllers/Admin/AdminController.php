<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Redirections;
use App\Models\RedirectionsStatistics;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function index()
    {
        $redirections = Redirections::with('statistics')->get()->sortByDesc('statistics.usage')->take(10);
        return view('admin.index')->with('redirections', $redirections);
    }
}
