<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['user_id', 'customer', 'perihal', 'start_date', 'due_date', 'total', 'amount', 'ppn', 'syarat'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function boqs()
    {
        return $this->hasMany(Boq::class, 'offer_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(OfferItems::class, 'offer_id', 'id');
    }
}
 