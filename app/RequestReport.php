<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestReport extends Model
{
    protected $fillable = ['request_id', 'project_id', 'applicant_id','perihal', 'status','total', 'amount'];

    public function applicant()
    {
        return $this->belongsTo(Users::class, 'applicant_id', 'id');
    }

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id', 'id');
    }
}
