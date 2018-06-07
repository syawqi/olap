<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = "location";
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function sale()
    {
        return $this->hasMany('App\Sale');
    }
}
