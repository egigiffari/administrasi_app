<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['category_id', 'project_id', 'code', 'creator_id', 'applicant_id', 'perihal', 'start_data', 'expire_date', 'status', 'total', 'amount'];

    public function categories()
    {
        return $this->belongsTo(RequestCategory::class, 'category_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function applicant()
    {
        return $this->belongsTo(User::class, 'applicant_id', 'id');
    }

    public function report()
    {
        return $this->hasOne(RequestReport::class, 'request_id', 'id');
    }

}