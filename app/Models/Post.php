<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Query\Builder;

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


    public function postTopic()
    {
        return $this->hasMany(topics::class,'post_id');
    }


    //属于某个作者的文章
    public function scopeAuthorBy(Builder $query,$user_id)
    {
        return $query->where('user_id',$user_id);
    }



    //不属于某个专题的文章
    public function scopeTopicNotBy(Builder $query,$topic_id)
    {
        return $query->doesntHave('postTopic','and',function ($q) use ($topic_id){
            $q->where('topic_id',$topic_id);
        });

//        return $query->where('topic_id','<>',$topic_id);
    }
}
