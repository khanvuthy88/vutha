<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    public function User()
    {
    	return $this->belongsTo(User::class);
    }

    public function Location()
    {
    	return $this->belongsTo(Location::class);
    }
}
