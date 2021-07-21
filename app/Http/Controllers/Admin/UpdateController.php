<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Symfony\Component\Process\Process;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function index()
    {        
        return view('admin.update.index');
    }

    public function update()
    {
        $process = new Process(['sh', base_path() . '/update.sh']);
        $process->run();
        return view('admin.update.inProgress');
    }

    public function complete()
    {
        return view('admin.update.complete');
    }
}
