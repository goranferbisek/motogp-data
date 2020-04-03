<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    protected $guarded = [];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }
}
