<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function UserDetail()
    {
    	return $this->hasOne(UserDetail::class);
    }

    public function Vendors()
    {
    	return $this->hasMany(Vendor::class);
    }
    public function Vehicle()
    {
    	return $this->hasMany(Vehicle::class);
    }
}
