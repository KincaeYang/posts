<?php

namespace App\Models;

use App\Models\BaseModel;

class Post extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at','desc');
    }

    public function zan($user_id)
    {
        return $this->hasOne(Zan::class)->where('user_id',$user_id);
    }

    public function zans()
    {
        return $this->hasMany(Zan::class);
    }
}
