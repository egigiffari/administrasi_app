<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestItems extends Model
{
    protected $fillable = ['request_id', 'items', 'name', 'merk', 'spec', 'price', 'sub', 'desc', 'image'];


    public function items()
    {
        return $this->belongsTo(Product::class, 'request_id', 'id');
    }

}

