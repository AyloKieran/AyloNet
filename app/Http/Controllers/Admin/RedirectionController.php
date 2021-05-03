<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Redirections;
use App\Models\RedirectionStatistics;

class RedirectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function index()
    {
        $search = request()->input('search');

        $redirections = Redirections::select('redirections.*')
            ->join('redirection_statistics', 'redirections.id', '=', 'redirection_statistics.id')
            ->where('route', 'like', '%' . $search . '%')
            ->orWhere('url', 'like', '%' . $search . '%')
            ->orderByDesc('redirection_statistics.usage')
            ->paginate(10)
            ->withQueryString();
        
        return view('admin.redirections.index')
            ->with('redirections', $redirections);
    }

    public function create()
    {
        return view('admin.redirections.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'route' => ['required', 'unique:redirections,route'],
            'url' => ['required', 'url'],
        ]);
        $attributes['user_id'] = request()->user()->id;

        $redirection = Redirections::create($attributes);

        $redirectionStatistic = RedirectionStatistics::firstOrNew(['id' => $redirection->id]);
        $redirectionStatistic['usage'] = 0;
        $redirectionStatistic->save();
        return redirect(route('admin.redirections'));
    }

    public function edit(Redirections $redirection)
    {
        return view('admin.redirections.edit')->with('redirection', $redirection);
    }

    public function update(Redirections $redirection)
    {
        $attributes = request()->validate([
            'url' => ['required', 'url'],
        ]);

        $redirection->url = request()->get('url');
        $redirection->user_id = request()->user()->id;

        $redirection->save();

        return redirect(route('admin.redirections'));
    }

    public function destroy(Redirections $redirection)
    {
        $redirectionStatistic = RedirectionStatistics::find(['id' => $redirection->id])->first();
        $redirectionStatistic->delete();

        $redirection->delete();

        return redirect(route('admin.redirections'));
    }
}
