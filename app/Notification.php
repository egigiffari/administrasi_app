<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['user_id', 'request_id', 'request_report_id', 'is_read'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id', 'id');
    }

    public function report()
    {
        return $this->hasOne(RequestReport::class, 'id', 'request_report_id');
    }
}
