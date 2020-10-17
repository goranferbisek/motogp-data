<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rider;
use Illuminate\Http\Request;

class RidersController extends Controller
{
    public function index()
    {
        return view('backend.riders.index', ['riders' => Rider::all()]);
    }
}
