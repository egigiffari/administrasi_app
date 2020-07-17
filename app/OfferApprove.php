<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferApprove extends Model
{
    protected $fillable = ['offer_id', 'user_id', 'subject', 'as', 'priority'];
    public $timestamps = false;

    public function offers()
    {
        return $this->belongsTo(Offer::class, 'offer_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
