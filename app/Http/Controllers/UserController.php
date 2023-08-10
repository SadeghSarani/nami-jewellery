<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignInRequest;
use App\Models\ContactUs;
use App\Models\SmsCode;
use App\Repository\CartRepository;
use App\Repository\UserRepository;
use App\Repository\UserTokenRepository;
use App\Services\Sms\SmsService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    private UserRepository $userRepository;
    private UserTokenRepository $userTokenRepository;
    private CartRepository $cartRepository;
    private SmsService $smsService;

    public function __construct()
    {
        $this->userRepository = app()->make(UserRepository::class);
        $this->userTokenRepository = app()->make(UserTokenRepository::class);
        $this->cartRepository = app()->make(CartRepository::class);
        $this->smsService = app()->make(SmsService::class);
    }

    public function login(LoginRequest $request)
    {
        $data = [
            'phone' => $request->input('phone', null),
            'password' => md5($request->input('password')),
        ];

        $user = $this->userRepository->checkUser($data);

        if (!$user) {
            return redirect()->route('userLoginPage')
                ->with('error', 'نام کاربری یا رمز عبور اشتباه است لطفا مجدد تلاش کنید');
        }

        $cookie = setToken($user);

        if ($user->is_admin) {

            return redirect()->route('manager.manager')->with('data', ['user' => $user->toArray()])->cookie($cookie);
        }

        return redirect('/')->with('data', ['user' => $user->toArray()])->cookie($cookie);
    }

    public function signing(SignInRequest $request)
    {
        try {
            $data = [
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'password' => md5($request->input('password')),
                'family' => $request->input('family'),
            ];

            $user = $this->userRepository->addUser($data);
            $cookie = setToken($user);

            return redirect('/')->with('data', ['user' => $user->toArray()])->cookie($cookie);
        } catch (ValidationException $exception) {
            dd($exception);
        }
    }

    public function loginPage()
    {
        return view('login');
    }

    public function signInPage()
    {
        return view('signIn');
    }

    public function aboutUs()
    {
        return view('clients.about-us');
    }

    public function contactUs(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|string',
            'email' => 'required|email',
            'description' => 'required|string',
        ]);

        ContactUs::query()->create($request->all());

        return redirect()->route('contactUs')->with('success', 'پیغام شما با موفقیت ارسال شد .');
    }

    public function profilePage()
    {
        $user = checkUserLogin();

        return view('clients.user-profile')->with('user', $user);
    }

    public function editProfilePage()
    {
        return view('clients.edit-profile')->with('user', checkUserLogin());
    }

    public function logout()
    {
        $user = checkUserLogin();
        $deletedCheck = $this->userTokenRepository->delete($user->id);

        if (!$deletedCheck) {
            return redirect()->route('userProfilePage')->with('user', $user);
        }

        return redirect()->route('userLoginPage');
    }

    public function buy(Request $request)
    {
        $user = checkUserLogin();
        $this->cartRepository->deleteAll($user->id);

    }

    public function changePass(Request $request)
    {
        $this->validate($request, [
            'phone_number' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'password' => md5($request->input('password'))
        ];
        $updated = $this->userRepository->update($request->input('phone_number'), $data);

        if ($updated != true) {

            return ['status' => false, 'message' => 'با خطا مواجه شد'];
        }

        return ['status' => true, 'message' => 'با موفیقیت تغییر کرد'];
    }


    public function verifyTwoStepWithMobile(Request $request)
    {
        $this->validate($request, [
            'phone_number' => 'required|digits:11'
        ]);

        $data = [
            'phone_number' => $request->input('phone_number'),
            'code' => $this->generateCode(),
            'expired_at' => Carbon::now()->addMinutes(2),
        ];

        $result = SmsCode::create($data);

        if ($result) {
//            $send = $this->smsService->sendVerifySms($result->phone_number, $result->code);

//            if ($send) {
            return ['status' => true, 'message' => 'کد تایید برای شما ارسال شد'];
//            }

//            return ['status' => false, 'message' => 'کد تایید ارسال نشد لطفا مجدد چند دقیقه بعد تلاش کنید'];
        }

        return ['status' => false, 'message' => 'کد تایید ارسال نشد لطفا مجدد چند دقیقه بعد تلاش کنید'];
    }

    public function verifyCode(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|digits:6'
        ]);

        $codeVerify = SmsCode::query()->where('code', $request->input('code'))->first();

        if (Carbon::now()->diffInMinutes($codeVerify->expired_at) >= 2) {

            return ['status' => false, 'message' => 'کد تایید منقضی شده'];
        }

        return ['status' => true, 'message' => 'کد مورد تایید است'];
    }

    public function changePassPage()
    {
        return view('changePassPage');
    }

    public function verifyMobilePage()
    {
        return view('verifyMobileCode');
    }

    private function generateCode()
    {
        $microtime = microtime(true);
        $randNum = rand(100000, 999999);
        $code = $randNum . substr(str_replace('.', '', $microtime), -6);

        return substr($code, 0, 6);
    }
}
