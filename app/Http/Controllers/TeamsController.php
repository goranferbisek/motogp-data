<?php

namespace App\Http\Controllers;

use App\Team;

class TeamsController extends Controller
{
    public function index()
    {
        //dd(Team::with('riders')->get());

        return view('teams.index', [
            'teams' => Team::with('riders')->get()
        ]);
    }
}
