<?php

namespace App\Repositories\Interfaces;


interface ZanRepositoryInterface
{
    public function store($post);
    public function delete($post);
}