<?php

namespace App\Http\Controllers\Admin;

use App\Rider;
use App\Team;
use App\Bike;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RidersController extends Controller
{
    public function index()
    {
        return view('backend.riders.index', ['riders' => Rider::all()]);
    }

    public function create()
    {
        return view('backend.riders.create', [
            'countries' => Country::all(),
            'teams' => Team::all(),
            'bikes' => Bike::all()
        ]);
    }

    public function store()
    {
        $attributes = $this->validateRider();
        $rider = new Rider($attributes);
        $rider->save();

        return redirect('/admin/riders');
    }

    public function edit(Rider $rider)
    {
        return view('backend.riders.edit', [
            'rider' => $rider,
            'countries' => Country::all(),
            'teams' => Team::all(),
            'bikes' => Bike::all()
        ]);
    }

    public function update(Rider $rider)
    {
        $attributes = $this->validateRider();
        $rider->update($attributes);

        return redirect('/admin/riders');
    }

    public function destroy(Rider $rider)
    {
        $rider->delete();
        return redirect('/admin/riders');
    }

    public function validateRider()
    {
        return request()->validate([
            'name' => 'required|unique:riders|max:255',
            'team_id' => 'required|exists:teams,id',
            'bike_id' => 'required|exists:bikes,id',
            'country_id' => 'required|exists:countries,id',
            'racing_number' => 'integer|min:1|max:99',
            'age' => 'required|integer|min:15|max:50',
        ]);
    }
}
