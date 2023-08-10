<?php

namespace App\Repository;

use App\Models\UserToken;

class UserTokenRepository
{

    private UserToken $userToken;

    public function __construct()
    {
        $this->userToken = app()->make(UserToken::class);
    }

    public function delete($userId)
    {
       return $this->userToken->query()->where('user_id', $userId)->delete();
    }
}
