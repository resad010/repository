<?php

namespace App\Repositories\UserRepository;

interface UserRepositoryInterface
{
    /**
     * @return mixed
     */
    function getAllUsers(): mixed;

    /**
     * @param $request
     * @return mixed
     */
    function insertUser($request): mixed;
}