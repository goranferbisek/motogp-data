<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Track;
use Illuminate\Http\Request;

class TracksController extends Controller
{
    public function index()
    {
        return view('backend.tracks.index', ['tracks' => Track::all()]);
    }
}
