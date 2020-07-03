<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestCategory extends Model
{
    protected $fillable = ['name', 'code', 'type', 'division_id', 'syarat',];
    public $timestamps = false;

    public function types()
    {
        return $this->belongsTo(RequestType::class, 'type', 'id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }

    public function responsibles()
    {
        return $this->hasMany(RequestResponsible::class, 'category_id', 'id');
    }
}
