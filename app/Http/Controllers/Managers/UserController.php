<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{

    public function getUsers()
    {
        $users = User::query()->paginate(15);

        return view('manager.user-list', ["users" => $users]);
    }

}

