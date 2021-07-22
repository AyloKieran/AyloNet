<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Artisan;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function update()
    {
        if(env('APP_ENV') == "prod") {
            $process = new Process(['sh', base_path() . '/update.sh']);
            $process->run();
        }
        Artisan::call('view:clear');

        return redirect(route('admin'));
    }
}
