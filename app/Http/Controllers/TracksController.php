<?php

namespace App\Http\Controllers;

use App\Track;
use Illuminate\Http\Request;

class TracksController extends Controller
{
    public function index()
    {
        return view('tracks.index', [
            'tracks' => Track::all()
        ]);
    }
}
