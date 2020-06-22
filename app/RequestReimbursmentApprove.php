<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestReimbursmentApprove extends Model
{
    protected $fillable = ['reimbursment_id', 'user_id', 'status', 'position', 'subject', 'priority'];
}
