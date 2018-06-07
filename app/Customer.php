<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public function sale()
    {
        return $this->hasMany('App\Sale');
    }
}
