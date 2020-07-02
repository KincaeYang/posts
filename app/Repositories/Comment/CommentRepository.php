<?php

namespace App\Repositories\Comment;


use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\CommentRepositoryInterface;



class CommentRepository implements CommentRepositoryInterface
{
    public function store()
    {
        $validator = Validator::make(request()->all(),[
            'content' => 'required|string'
        ]);

        if ($validator->fails()){
            return [
                'code' => config('public.BaseInfo.returnInfo.code.loser'),
                'lists' => $validator
            ];
        }

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = request('post_id');
        $comment->content = request('content');
        $comment->save();

        return [
            'code' => config('public.BaseInfo.returnInfo.code.success'),
        ];
    }
}