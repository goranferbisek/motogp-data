<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use App\Track;
use Illuminate\Http\Request;

class TracksController extends Controller
{
    public function index()
    {
        return view('backend.tracks.index', ['tracks' => Track::all()]);
    }

    public function create()
    {
        return view('backend.tracks.create', ['countries' => Country::all()]);
    }

    public function store()
    {
        $attributes = $this->validateTrack();
        $track = new Track($attributes);
        $track->save();

        return redirect('/admin/tracks');
    }

    public function edit(Track $track)
    {
        return view('backend.tracks.edit', [
            'track' => $track,
            'countries' => Country::all()
        ]);
    }

    public function update(Track $track)
    {
        $attributes = $this->validateTrack();
        $track->update($attributes);

        return redirect('/admin/tracks');
    }

    public function destroy(Track $track)
    {
        $track->delete();
        return redirect('/admin/tracks');
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
