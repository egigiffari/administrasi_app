<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestReport extends Model
{
    protected $fillable = ['category_id','request_id', 'project_id', 'applicant_id','perihal', 'status','total', 'amount'];

    public function applicant()
    {
        return $this->belongsTo(User::class, 'applicant_id', 'id');
    }

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id', 'id');
    }

    public function categories()
    {
        return $this->belongsTo(RequestCategory::class, 'category_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(RequestReportItem::class, 'report_id', 'id');
    }

    public function responsibles()
    {
        return $this->hasMany(RequestReportApprove::class, 'report_id', 'id');
    }

    public function bills()
    {
        return $this->hasMany(ReportBill::class, 'report_id', 'id');
    }
}
