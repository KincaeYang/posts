<?php

namespace App\Repositories\Register;

use App\Models\User;
use App\Repositories\Interfaces\RegisterRepositoryInterface;
use Illuminate\Support\Facades\Validator;


class RegisterReposity implements RegisterRepositoryInterface
{
    public function register()
    {
        $validator = Validator::make(request()->all(),[
            'name'=>'required|unique:users,name',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:10|confirmed',
        ]);

        if ($validator->fails()){
            return [
                'code' => config('public.BaseInfo.returnInfo.code.loser'),
                'lists' => $validator
            ];
        }

        $name = request('name');
        $email = request('email');
        $password = bcrypt(request('password'));

        //缺少 开启事务 + try catch
        User::create(compact('name','email','password'));
    }

}