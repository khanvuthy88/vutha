<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    
    public function Vehicle()
    {
    	return $this->belongsTo(Vehicle::class);
    }

    public function Vendor()
    {
    	return $this->belongsTo(Vendor::class);
    }
}