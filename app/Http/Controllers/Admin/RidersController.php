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
}
