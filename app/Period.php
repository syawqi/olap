<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $table = "period";
//    protected $appends =['period_sale'];
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function sale()
    {
        return $this->hasMany('App\Sale');
    }
}
