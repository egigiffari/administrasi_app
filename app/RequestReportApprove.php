<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestReportApprove extends Model
{
    protected $fillable = ['report_id', 'user_id', 'status', 'position', 'subject', 'priority'];
}
