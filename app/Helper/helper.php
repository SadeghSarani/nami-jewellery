<?php

use App\Models\User;
use App\Models\UserToken;
use Carbon\Carbon;
use Illuminate\Support\Str;


function checkUserLogin()
{
    $UserToken = false;
    if (isset($_COOKIE['UserToken'])) {
        $UserToken = UserToken::where('token', $_COOKIE['UserToken'])->orderby('id', 'ASC')->first();
        if (!$UserToken) {
            setcookie("UserToken", "", time() - 3600);
            goto Condition;
        }
        $user = User::where('id', $UserToken->user_id)->with('addresses')->first();
    }

    Condition:
    if ($UserToken) {
        return $user;

    } else {
        return false;
    }

}

function setToken(User $user)
{
    $token = Str::random(60);
    $token_expired_at = Carbon::now()->addDays(10);
    UserToken::create([
        'user_id' => $user->id,
        'token' => $token,
        'expired_at' => $token_expired_at
    ]);

    return cookie("UserToken", $token, $token_expired_at->timestamp);
}

function Aouth()
{

    if (!checkUserLogin()) {
        return redirect(route('user.login'));
    }
}
