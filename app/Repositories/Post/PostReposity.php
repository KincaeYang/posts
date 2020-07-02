<?php

namespace App\Repositories\Post;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\PostRepositoryInterface;


class PostReposity implements PostRepositoryInterface
{
    use AuthorizesRequests;


    public function index()
    {
        return Post::withCount('zans')->withCount('comment')->with('user')->orderBy('created_at','desc')->paginate(5);
    }


    public function store()
    {
        $validator = Validator::make(request()->all(),[
            'title' => 'bail|required|string|max:100',
            'content' => 'required|string|min:10'
        ]);

        if ($validator->fails()){
            return [
                'code' => config('public.BaseInfo.returnInfo.code.loser'),
                'lists' => $validator
            ];
        }

        //开启事务 + try catch
        $user_id = Auth::id();
        $params = array_merge(request(['title','content']),compact('user_id'));
        Post::create($params);
    }


    public function update($post)
    {
        $this->authorize('update',$post);
        $validator = Validator::make(request()->all(),[
            'title' => 'bail|required|string|max:100',
            'content' => 'required|string|min:10'
        ]);

        if ($validator->fails()){
            return [
                'code' => config('public.BaseInfo.returnInfo.code.loser'),
                'lists' => $validator
            ];
        }

        $post->title = request('title');
        $post->content = request('content');
        $post->save();
        return [
            'code' => config('public.BaseInfo.returnInfo.code.success'),
            'lists' => $post
        ];
    }


    public function delete($post)
    {
        $this->authorize('delete',$post);
        $post->delete();
    }
}