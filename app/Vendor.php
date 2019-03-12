<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    
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
}
