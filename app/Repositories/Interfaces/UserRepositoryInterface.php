<?php

namespace App\Repositories\Interfaces;


interface UserRepositoryInterface
{
    public function show($user);
    public function fan($user);
    public function unfan($user);
}