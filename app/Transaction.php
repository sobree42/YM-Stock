<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'quantity', 'price', 'total_quantity', 'product_id', 'user_id'
    ];
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function unit_type()
    {
        return $this->belongsTo('App\UnitType');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
