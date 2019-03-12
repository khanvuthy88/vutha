<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    public function Vehicle()
    {
    	return $this->belongsTo(Vehicle::class);
    }
}
