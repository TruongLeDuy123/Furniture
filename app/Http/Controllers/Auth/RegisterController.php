<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\KhachHang;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'HoTen' => $data['name'],
            'Email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user)
        {
            return response()->json(['message' => 'Email này đã tồn tại']);
        }
        $customer = KhachHang::create([
            'HoTen' => $request->HoTen,
            'Email' => $request->email,
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $otp = Str::random(6);
        $user->otp_code = $otp;
        $user->save();
        try {
            Mail::to($user->email)->send(new OtpMail($otp));
            return response()->json([
                'message' => 'Đăng ký thành công. Vui lòng kiểm tra email để nhận mã OTP!',
                'user' => $user,
                'customer' => $customer
            ]);
        }
        catch (\Exception $e) {
            return response()->json([
                'message' => 'Loi: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function verifyOtp(Request $request)
    {
        if (!$request->otp_code)
        {
            return response()->json(['message' => "Vui lòng nhập mã OTP!"]);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user)
        {
            return response()->json(['message' => 'Người dùng không tồn tại']);
        }
        if ($user->otp_code != $request->otp_code)
        {
            return response()->json(['message' => 'Mã OTP không hợp lệ!']);
        }
        $user->otp_code = null;
        $user->save();
        return response()->json(['message' => 'Xác thực OTP thành công']);
    }
}
