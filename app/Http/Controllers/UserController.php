<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $UserReposity;


    public function __construct(UserRepositoryInterface $UserReposity)
    {
        $this->UserReposity = $UserReposity;
    }


    public function setting()
    {
        return view('user.setting');
    }


    public function settingStore()
    {

    }


    public function show(User $user)
    {
        $arrData = $this->UserReposity->show($user);
        return view('user.show',compact('arrData'));
    }


    public function dofan(User $user)
    {
        $me = Auth::user();
        $me->doFan($user->id);
        return [
            'error'=>0,
            'msg'=>''
        ];
    }


    public function unfan(User $user)
    {
        $me = Auth::user();
        $me->doUnFan($user->id);
        return [
            'error'=>0,
            'msg'=>''
        ];
    }
}
