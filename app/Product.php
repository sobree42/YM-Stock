<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'brand_id', 'category_id', 'store_id', 'quantity', 'unit_type_id'
    ];

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    public function unit_type()
    {
        return $this->belongsTo('App\UnitType');
    }

    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }

    public function last_transaction()
    {
        return $this->transaction()->latest();

    }
}
