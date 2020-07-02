<?php

namespace App\Repositories\Interfaces;


interface PostRepositoryInterface
{
    public function  index();
    public function  store();
    public function  update($model);
    public function  delete($model);
}