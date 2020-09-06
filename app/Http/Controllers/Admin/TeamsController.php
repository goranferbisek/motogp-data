<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index()
    {
        return view('backend.teams.index', [
            'teams' => Team::all()
        ]);
    }

    public function create()
    {
        return view('backend.teams.create');
    }

    public function store()
    {
        $attributes = request()->validate(['name' => 'required|max:255']);
        $team = new Team($attributes);
        $team->save();

        return redirect('/admin/teams');
    }
}
