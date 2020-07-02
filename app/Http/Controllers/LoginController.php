<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\LoginRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    protected $LoginReposity;


    public function __construct(LoginRepositoryInterface $loginRepository)
    {
        $this->LoginReposity = $loginRepository;
    }


    public function index()
    {
        return view('login.index');
    }


    public function login()
    {
        $data = $this->LoginReposity->login();
        if ($data['code'] == config('public.BaseInfo.returnInfo.code.loser')) {
            return redirect('login')
                ->withErrors($data['lists'])
                ->withInput();
        }else if ($data['code'] == config('public.BaseInfo.returnInfo.code.error')){
            return redirect()->back()->withErrors('账号密码不正确！');
        }else{
            return redirect('/posts');
        }

    }


    public function logout()
    {
        $this->LoginReposity->logout();
        return redirect('login');
    }
}
