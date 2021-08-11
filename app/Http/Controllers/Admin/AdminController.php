<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

use App\Models\RedirectionStatistics;
use App\Models\Redirections;
use App\Models\User;
use App\Models\Posts;
use App\Models\Upload;
use App\Models\DecisionMakerSavedLists;

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
        $uploads = Upload::orderByDesc('created_at')->get();
        $uploadsSize = 0;
        $version = File::get(base_path() . '/version.txt');
        $lists = DecisionMakerSavedLists::orderByDesc('created_at')->get();

        foreach( File::allFiles(storage_path() . "/app/public/uploads") as $file)
        {
            $uploadsSize += $file->getSize();
        }

        $uploadsSize = number_format($uploadsSize / 1073741824, 2);

        return view('admin.index')
            ->with('redirections', $redirections)
            ->with('redirectionStatistics', $redirectionStatistics)
            ->with('users', $users)
            ->with('posts', $posts)
            ->with('uploads', $uploads)
            ->with('uploadsSize', $uploadsSize)
            ->with('version', $version)
            ->with('lists', $lists);
    }
}
