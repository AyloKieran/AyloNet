<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        return view('user.index');
    }

    function destroy()
    {
        auth()->user()->delete();
        return redirect(route('home'));
    }
}
