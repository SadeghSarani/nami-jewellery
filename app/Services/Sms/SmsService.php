<?php

namespace App\Services\Sms;

use Illuminate\Support\Facades\Http;
use Kavenegar\KavenegarApi;

class SmsService
{
    private KavenegarApi $kavenegar;

    const SENDER_NUMBER = '10008663';

    public function __construct()
    {
        $this->kavenegar = app()->make(KavenegarApi::class, ['apiKey' => config('kavenegar')['sms_key']]);
    }


    public function sendVerifySms($phone, $code)
    {
        $result = $this->kavenegar->Send(self::SENDER_NUMBER, $phone, $code, true, 'verify');

        if ($result){

            return true;
        }

        return  false;

    }

    public function sendSmsMessage($phone, $message)
    {
        $result = $this->kavenegar->Send(self::SENDER_NUMBER, $phone, $message);

        if ($result){

            return true;
        }

        return  false;
    }
}
