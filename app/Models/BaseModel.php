<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    //不可注入的字段;根据业务逻辑可自行修改
    protected $guarded = [];
}
