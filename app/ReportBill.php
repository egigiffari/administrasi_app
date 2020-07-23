<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportBill extends Model
{
    protected $fillable = ['report_id', 'bill'];

    public function report()
    {
        return $this->belongsTo(RequestReport::class, 'id', 'report_id');
    }
}
