<?php

namespace App\Http\Controllers\SPA;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('spa');
    }
}
