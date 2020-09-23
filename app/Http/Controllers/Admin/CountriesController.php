<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function index()
    {
        return view('backend.countries.index', [
            'countries' => Country::all()
        ] );
    }
}
