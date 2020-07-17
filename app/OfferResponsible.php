<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferResponsible extends Model
{
    protected $fillable = ['user_id', 'subject', 'as', 'priority'];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
