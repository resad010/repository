<?php

namespace App\Repositories\UserRepository;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepositorySQL implements UserRepositoryInterface
{
    /**
     * @return Collection
     */
    function getAllUsers(): Collection
    {
        return User::all();
    }

    /**
     * @param $request
     * @return mixed
     */
    function insertUser($request): mixed
    {
        return User::create([
            'full_name' => $request['full_name'],
            'email' => $request['email'],
            'password' => $request['password']
        ]);
    }
}