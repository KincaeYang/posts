<?php

namespace App\Models;

use App\Models\BaseModel;

class Fans extends BaseModel
{

    public function fuser()
    {
        return $this->hasOne(User::class,'id','fan_id');
    }

    public function suser()
    {
        return $this->hasOne(User::class,'id','start_id');
    }
}
