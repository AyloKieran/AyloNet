<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class VersionController extends Controller
{
    public function serve()
    {
        $localVersion = File::get(base_path() . '/version.txt');
        $remoteVersion = Http::get(env("GIT_REPO_VERSION"))->body();
        $updateAvailable = $localVersion < $remoteVersion;

        $version = array();

        $version = Arr::add($version, 'localVersion', $localVersion);
        $version = Arr::add($version, 'remoteVersion', $remoteVersion);
        $version = Arr::add($version, 'updateAvailable', $updateAvailable);

        return $version;
    }
}