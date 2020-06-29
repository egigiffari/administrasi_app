<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestReportItem extends Model
{
    protected $fillable = ['report_id', 'items', 'name', 'merk', 'spec', 'price', 'sub', 'desc', 'image'];

    public function items()
    {
        return $this->belongsTo(Product::class, 'items', 'id');
    }
}
