<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $guarded = [];

    public function riders()
    {
        return $this->hasMany(Rider::class);
    }
}
