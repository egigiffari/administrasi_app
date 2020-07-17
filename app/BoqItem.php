<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoqItem extends Model
{
    
    protected $fillable = ['boq_id', 'item', 'spec', 'spec', 'volume', 'unit', 'price', 'sub'];
    public $timestamps = false;

    public function boq()
    {
        return $this->hasOne(Boq::class, 'id', 'boq_id');
    }
}
