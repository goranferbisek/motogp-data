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
        $attributes = $this->validateTeam();
        $team = new Team($attributes);
        $team->save();

        return redirect('/admin/teams');
    }

    public function edit(Team $team)
    {
        return view('backend.teams.edit', ['team' => $team]);
    }

    public function update(Team $team) {
        $attributes = $this->validateTeam();

        $team->update($attributes);

        return redirect('/admin/teams');
    }

    public function destroy(Team $team)
    {
        $team->delete();

        return redirect('/admin/teams');
    }

    protected function validateTeam()
    {
        return request()->validate(['name' => 'required|unique:teams|max:255']);
    }
}
