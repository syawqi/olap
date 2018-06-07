<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public function sale()
    {
        return $this->hasMany('App\Sale');
    }
}
