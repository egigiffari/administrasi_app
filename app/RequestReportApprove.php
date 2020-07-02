<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestReportApprove extends Model
{
    protected $fillable = ['report_id', 'user_id', 'status', 'position', 'subject', 'priority'];

    public function report()
    {
        return $this->hasOne(RequestReport::class, 'report_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
