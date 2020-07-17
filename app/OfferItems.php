<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferItems extends Model
{
    public $timestamps = false;

    public function offer()
    {
        return $this->hasOne(Offer::class, 'id', 'offer_id');
    }
}
