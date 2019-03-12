<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function User()
    {
    	return $this->belongsTo(User::class);
    }

    public function Location()
    {
    	return $this->belongsTo(Location::class);
    }

    public function Repair()
    {
    	return $this->hasMany(Repair::class);
    }

    public function Fuel()
    {
        return $this->hasMany(Fuel::class);
    }

    public function Trip()
    {
        return $this->hasMany(Trip::class);
    }
}
