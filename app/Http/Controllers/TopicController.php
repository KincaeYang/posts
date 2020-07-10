<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TopicRepositoryInterface;

class TopicController extends Controller
{
    protected $topicRepository;


    public function __construct(TopicRepositoryInterface $topicRepository)
    {
        $this->topicRepository = $topicRepository;
    }


    //模型绑定
    public function show()
    {
        return view('topic.show');
    }


    //投稿
    public function submit()
    {

    }
}
