<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable = ['name', 'slug'];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }
}
