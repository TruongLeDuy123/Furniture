<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use App\Models\KhachHang;
use App\Models\NhanVien;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function forgot_password(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user)
        {
            return response()->json([
                'message' => 'Người dùng không tồn tại'
            ]);
        }
        $otp = Str::random(6);
        $user->otp_code = $otp;
        $user->save();
        Mail::to($request->email)->send(new OtpMail($otp));
        return response()->json(['message'=> 'ok']);
    }
    
    public function verifyOtp(Request $request)
    {
        if (!$request->otp_val)
        {
            return response()->json(['message' => "Vui lòng nhập mã OTP!"]);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user || $user->otp_code != $request->otp_val)
        {
            return response()->json(['message' => 'Mã OTP không hợp lệ!']);
        }
        $user->otp_code = null;
        $user->save();
        return response()->json(['message' => 'Xác thực OTP thành công']);
    }

    public function reset_password(Request $request)
    {   
        if ($request->newPw != $request->confirmPw)
        {
            return response()->json(['message' => 'Mật khẩu không trùng nhau']);
        }
        $user = User::where('email', $request->email)->first();
        if ($user)
        {
            $user->update([
                'password' => Hash::make($request->newPw)
            ]);
            $user->save();
            return response()->json(['message' => 'Cập nhật mật khẩu thành công!']);
        }
        else
        {
            return response()->json(['message' => 'Người dùng không tồn tại!']);
        }
    }
}
