<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Interfaces\RegisterRepositoryInterface;


class RegisterController extends Controller
{
    protected $RegisterReposity;


    public function __construct(RegisterRepositoryInterface $RegisterReposity)
    {
        $this->RegisterReposity = $RegisterReposity;
    }


    public function index()
    {
        return view('Register.index');
    }


    public function register()
    {
        $data = $this->RegisterReposity->register();

        if ($data['code'] == config('public.BaseInfo.returnInfo.code.loser')) {
            return redirect('register')
                ->withErrors($data['lists'])
                ->withInput();
        }else{
            return redirect('login');
        }
    }
}
