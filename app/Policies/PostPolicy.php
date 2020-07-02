<?php

namespace App\Policies;


use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    //abstract permissions into a class
    public function update(User $user,Post $post)
    {
        return $user->id === $post->user_id;
    }


    public function delete(User $user,Post $post)
    {
        return $user->id === $post->user_id;
    }
}