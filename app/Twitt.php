<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twitt extends Model
{

    protected $guarded = [];



    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function replies()
    {
        return $this->hasMany(Reply::class,'twit_id');
    }



    public function likes()
    {
        return $this->hasMany(Like::class,'twit_id');
    }


    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    //
}
