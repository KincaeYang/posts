<?php

namespace App\Repositories\Zan;

use App\Models\Zan;
use App\Repositories\Interfaces\ZanRepositoryInterface;
use Illuminate\Support\Facades\Auth;


class ZanRepository implements ZanRepositoryInterface
{
    public function store($post)
    {
        $data = [
            'post_id' => $post['id'],
            'user_id' => Auth::id(),
        ];

        Zan::firstOrCreate($data);
    }


    public function delete($post)
    {
        $post->zan(Auth::id())->delete();
    }
}