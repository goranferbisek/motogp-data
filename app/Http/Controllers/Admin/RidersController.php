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

    public function validateRider()
    {
        return request()->validate([
            'name' => 'required|unique:riders|max:255',
            'team_id' => 'required|numeric',
            'bike_id' => 'required|numeric',
            'country_id' => 'required|numeric',
            'racing_number' => 'required|numeric',
            'age' => 'required|numeric',
        ]);
    }
}
