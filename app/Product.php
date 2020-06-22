<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['code', 'merk', 'name', 'type', 'spec','unit', 'last_price', 'image'];

    public function brand()
    {
        return $this->belongsTo('App\Brand', 'merk', 'id');
    }

    public function productType()
    {
        return $this->belongsToMany(ProductType::class);
    }
}
