<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitType extends Model
{
    protected $fillable = [
        'type'
    ];

    public function product()
    {
        return $this->hasMany('App\Product');
    }
    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }

}
