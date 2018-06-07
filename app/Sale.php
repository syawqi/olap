<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = "sale";
    protected $appends =['period_sale'];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public function customer()
    {
        return $this->belongsTo('App\Customer','customer_id','id');
    }

    public function period()
    {
        return $this->belongsTo('App\Period','period_id','id');
    }

    public function location()
    {
        return $this->belongsTo('App\Location','location_id','id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }

    public function getPeriodSaleAttribute(){
        return $this->period->year;
    }

}
