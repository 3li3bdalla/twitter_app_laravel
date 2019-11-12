<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = [];

    public function twit()
    {
        return $this->belongsTo(Twitt::class,'twit_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
