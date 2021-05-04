<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function index()
    {
        $search = request()->input('search');

        $users = User::orderBy('created_at', 'DESC')
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%')
            ->orWhere('provider_id', 'like', '%' . $search . '%')
            ->paginate(30)->withQueryString();
        return view('admin.users.index')->with('users', $users);
    }
}
