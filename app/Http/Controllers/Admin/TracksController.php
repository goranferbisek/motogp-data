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

    public function store()
    {
        // $attributes = $this->validateTrack();
    }

    public function validateTrack()
    {
        return request()->validate([
            'country_id' => 'required|exists:countries,id',
            'name' => 'required|unique:tracks|max:255',
            'length' => 'required|integer|min:1|max:25000'
        ]);
    }
}
