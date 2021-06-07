<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OverlayController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        return view('overlay');
    }
}
