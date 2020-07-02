<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $PostRepository;

    public function __construct(PostRepositoryInterface $PostRepository)
    {
        $this->PostRepository = $PostRepository;
    }

    public function index()
    {
        $posts = $this->PostRepository->index();
        return view('post/index',compact('posts'));
    }


    public function show(Post $post)
    {
        return view('post/show',compact('post'));
    }


    public function create()
    {
        return view('post/create');
    }


    public function store()
    {
        $data = $this->PostRepository->store();

        if ($data['code'] == config('public.BaseInfo.returnInfo.code.loser')) {
            return redirect('posts/create')
                ->withErrors($data['lists'])
                ->withInput();
        }else{
            return redirect('/posts');
        }
    }


    public function edit(Post $post)
    {
        return view('post/edit',compact('post'));
    }


    public function update(Post $post)
    {
        $data = $this->PostRepository->update($post);
        if ($data['code'] == config('public.BaseInfo.returnInfo.code.loser')) {
            return redirect('posts/'.$post['id'].'/edit')
                ->withErrors($data['lists'])
                ->withInput();
        }else{
            return redirect('/posts');
        }
    }

    public function delete(Post $post)
    {
        //用户权限认证
        $this->PostRepository->delete($post);
        return redirect('posts');
    }
}
