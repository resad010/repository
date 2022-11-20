<?php

namespace App\Controllers;

use App\Repositories\UserRepository\UserRepositoryInterface;

class UserController
{
    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(private readonly UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @return mixed
     */
    public function index(): mixed
    {
        return $this->userRepository->getAllUsers();
    }

    /**
     * @param array $users
     * @return mixed
     */
    public function store(array $users): mixed
    {
        return $this->userRepository->insertUser($users);
    }
}