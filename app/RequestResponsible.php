<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestResponsible extends Model
{
    protected $fillable = ['category_id', 'user_id', 'subject', 'as', 'priority'];
    public $timestamps = false;

    public function categories()
    {
        return $this->belongsTo(RequestCategory::class, 'category_id', 'id');
    }

    public function users() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
