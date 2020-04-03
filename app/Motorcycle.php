<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    protected $guarded = [];

    public function riders()
    {
        return $this->hasMany(Rider::class);
    }
}
