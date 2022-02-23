<?php

namespace App\Http\Controllers\Api;

use App\Models\Office;
use App\Http\Controllers\Controller;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Office::all();
    }
}
