<?php

namespace App\Http\Controllers;

use App\Rider;
use Illuminate\Http\Request;

class RidersController extends Controller
{
    public function index()
    {
        return view('riders.index', [
            'riders' => Rider::all()
        ]);
    }
}
