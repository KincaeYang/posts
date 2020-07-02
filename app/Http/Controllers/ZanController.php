<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ZanRepositoryInterface;

class ZanController extends Controller
{
    protected $zanRepository;


    public function __construct(ZanRepositoryInterface $zanRepository)
    {
        $this->zanRepository = $zanRepository;
    }


    public function store(Post $post)
    {
        $this->zanRepository->store($post);
        return back();
    }

    public function delete(Post $post)
    {
        $this->zanRepository->delete($post);
        return back();
    }
}
