<?php

namespace App\Repository;

use App\Models\User;

class UserRepository
{

    private User $model;

    public function __construct()
    {
        $this->model = app()->make(User::class);
    }

    public function checkUser($data)
    {
        return $this->model->query()
            ->where('phone', $data['phone'])
            ->where('password', $data['password'])
            ->first();
    }

    public function addUser($data)
    {
        return $this->model->query()->create($data);
    }

    public function update($phone_number, $data)
    {
        return $this->model->query()->where('phone', $phone_number)->update($data);
    }
}
