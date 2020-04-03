<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    public function riders()
    {
        return $this->hasMany(Rider::class);
    }
}
