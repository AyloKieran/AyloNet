<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redirections;
use App\Models\RedirectionStatistics;
use App\Models\Posts;

class PageController extends Controller
{
    public function serve($path)
    {
        $redirect = Redirections::where('route', $path)->first();
        if($redirect) {
            $redirectionStatistic = RedirectionStatistics::find(['id' => $redirect->id])->first();
            $redirectionStatistic->usage = $redirectionStatistic->usage + 1;
            $redirectionStatistic->save();

            return view('redirect')->with('url', $redirect->url);
        }

        $post = Posts::where('route', $path)->first();
        if($post) {
            $posts = Posts::orderByDesc('created_at')->get()->take(3);
            return view('post')->with('post', $post)->with('posts', $posts);
        }

        $page = base_path() . "/resources/views/pages/{$path}.blade.php";
        if(file_exists($page)){
            return view('pages/'. $path);
        }

        abort(404);
    }
}