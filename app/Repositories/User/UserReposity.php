<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;


class UserReposity implements UserRepositoryInterface
{
    public function show($user)
    {
        //根据传入的id查找对应的文章数、关注数、粉丝数
        $user = User::withCount(['post','start','fans'])->find($user->id);
        //文章
        $posts = $user->post()->orderBy('created_at','desc')->take(10)->get();
        //关注
        $start = $user->start;
        $susers = User::whereIn('id',$start->pluck('start_id'))->withCount(['start','fans','post'])->get();
        //粉丝
        $fans = $user->fans;
        $fusers = User::whereIn('id',$fans->pluck('fan_id'))->withCount(['start','fans','post'])->get();
        return [
            'user'=>$user,
            'posts'=>$posts,
            'susers'=>$susers,
            'fusers'=>$fusers
        ];
    }
    public function fan($user)
    {
        return ;
    }
    public function unfan($user)
    {
        return ;
    }
}