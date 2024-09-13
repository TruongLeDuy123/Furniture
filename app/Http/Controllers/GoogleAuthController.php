<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\NhanVien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::updateOrCreate(
            ['google_id' => $googleUser->id],
            [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => Str::random(12),
            ]
        );
        $nhanvien = NhanVien::where('Email', $googleUser->email)->first();
        $token = $user->createToken('auth-token')->plainTextToken;
        if ($nhanvien) {
            $nhanvien['google_id'] = $googleUser->id;
            $nhanvien->save();
            $DATA = [
                'message' => 'Login Successfull',
                'token' => $token,
                'data' => $user,
                'nhanvien' => $nhanvien,
            ];
            return redirect('/customer_manager')->with('DATA', $DATA);
        } else {
            $khachhang = KhachHang::updateOrCreate(
                ['google_id' => $googleUser->id],
                [
                    'HoTen' => $googleUser->name,
                    'Email' => $googleUser->email,
                ]
            );
            $DATA = [
                'message' => 'Login Successfull',
                'token' => $token,
                'data' => $user,
                'khachhang' => $khachhang,
            ];
            return redirect('/')->with('DATA', $DATA);
        }
    }
}
