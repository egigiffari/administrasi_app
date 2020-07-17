<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boq extends Model
{
    protected $fillable = ['offer_id', 'perihal', 'sub', 'ppn', 'total', 'amount'];

    public function offer ()
    {
        return $this->hasOne(Offer::class, 'id', 'offer_id');
    }

    public function items()
    {
        return $this->hasMany(BoqItem::class, 'boq_id', 'id');
    }
}
