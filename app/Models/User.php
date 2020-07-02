<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Post;

class User extends Authenticatable
{
    protected $guarded = [];


    public function post()
    {
        return $this->hasMany(Post::class,'user_id','id');
    }


    //关注传入id的人数
    public function fans()
    {
        return $this->hasMany(Fans::class,'start_id','id');
    }


    //传入id关注的人数
    public function start()
    {
        return $this->hasMany(Fans::class,'fan_id','id');
    }


    //我关注某人
    public function doFan($uid)
    {
        $fan = new Fans();
        $fan->start_id = $uid;
        return $this->start()->save($fan);
    }


    //取消关注
    public function doUnFan($uid)
    {
        $fan = new Fans();
        $fan->start_id = $uid;
        return $this->start()->delete($fan);
    }


    //是否被关注
    public function hasFan($uid)
    {
        return $this->fans()->where('fan_id',$uid)->count();
    }


    //是否关注
    public function hasStart($uid)
    {
        return $this->start()->where('start_id',$uid)->count();
    }

}
