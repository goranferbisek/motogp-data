<?php

namespace App\Http\Controllers\Admin;

use App\Bike;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BikesController extends Controller
{
    public function index()
    {
        return view('backend.bikes.index', [
            'bikes' => Bike::all()
        ]);
    }

    public function create()
    {
        return view('backend.bikes.create');
    }

    public function store()
    {
        $attributes = $this->validateBike();
        $bike = new Bike($attributes);
        $bike->save();

        return redirect('/admin/bikes');
    }

    public function edit(Bike $bike)
    {
        return view('backend.bikes.edit', ['bike' => $bike]);
    }

    public function validateBike()
    {
        return request()->validate([
            'make' => 'required|unique:bikes|max:255'
        ]);
    }
}
