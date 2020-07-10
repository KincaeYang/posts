<?php

namespace App\Models;

use App\Models\BaseModel;

class topics extends BaseModel
{
    public function post()
    {
        return $this->belongsToMany(Post::class,'post_topic');
    }
}
