<?php

namespace App\Http\Controllers\Admin;

use App\Bike;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BikesController extends Controller
{
    public function index()
    {
        return view('backend.bikes.index', [
            'bikes' => Bike::all()
        ]);
    }
}
