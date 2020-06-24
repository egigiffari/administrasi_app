<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestApprove extends Model
{
    protected $fillable = ['request_id', 'user_id', 'status', 'position', 'subject', 'priority'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
