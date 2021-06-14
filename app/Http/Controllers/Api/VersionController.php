<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class VersionController extends Controller
{
    public function serve()
    {
        $version = array();

        $version = Arr::add($version, 'version', File::get(base_path() . '/version.txt'));

        return $version;
    }
}