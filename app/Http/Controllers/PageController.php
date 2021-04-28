<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redirections;
use App\Models\RedirectionStatistics;

class PageController extends Controller
{
    public function serve($path)
    {
        $redirect = Redirections::where('route', $path)->first();
        if($redirect) {
            $redirectionStatistic = RedirectionStatistics::firstOrNew(['id' => $redirect->id]);
            $redirectionStatistic->usage = $redirectionStatistic->usage + 1;
            $redirectionStatistic->save();

            return redirect($redirect->url);
        }
        abort(404);
    }
}