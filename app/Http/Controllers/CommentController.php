<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\CommentRepositoryInterface;

class CommentController extends Controller
{
    protected $commentRepository;


    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }


    public function store()
    {
        $data = $this->commentRepository->store();

        if ($data['code'] == config('public.BaseInfo.returnInfo.code.loser')) {
            return redirect('/posts/'.request('post_id'))
                ->withErrors($data['lists'])
                ->withInput();
        }else{
            return redirect('/posts/'.request('post_id'));
        }
    }
}
