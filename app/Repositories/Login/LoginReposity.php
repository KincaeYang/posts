<?php

namespace App\Repositories\Login;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\LoginRepositoryInterface;


class LoginReposity implements LoginRepositoryInterface
{
    public function login()
    {
        $validator = Validator::make(request()->all(),[
            'email' => 'required|email',
            'password' => 'required|min:6|max:10',
            'is_remember' => 'integer',
        ]);

        if ($validator->fails()){
            return [
                'code' => config('public.BaseInfo.returnInfo.code.loser'),
                'lists' => $validator
            ];
        }
        $user = request(['email','password']);
        $is_remember = boolval(request('is_remember'));
        if (Auth::attempt($user,$is_remember)){
            return [
                'code' => config('public.BaseInfo.returnInfo.code.success'),
            ];
        }

        return [
            'code' => config('public.BaseInfo.returnInfo.code.error'),
        ];
    }


    public function logout()
    {
        Auth::logout();
    }
}