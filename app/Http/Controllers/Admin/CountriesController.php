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

    public function create()
    {
        return view('backend.countries.create');
    }

    public function store(Country $country)
    {
        $attributes = $this->validateCountry();
        $country = new Country($attributes);
        $country->save();

        return redirect('/admin/countries');
    }

    public function edit(Country $country)
    {
        return view('backend.countries.edit', ['country' => $country]);
    }

    public function validateCountry()
    {
        return request()->validate([
            'name' => 'required|unique:countries|max:255'
        ]);
    }
}
