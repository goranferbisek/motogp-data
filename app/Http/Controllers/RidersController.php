<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RidersController extends Controller
{
    public function index()
    {
        return view('riders.index');
    }
}
