<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function change_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|min:6|max:100',
            'confirm_password' => 'required|same:password'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validations fails',
                'errors' => $validator->errors()
            ]);
        }
        $user = $request->user();

        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return response()->json(['message' => 'Mật khẩu đã được cập nhật thành công']);
        } else {
            return response()->json(['message' => 'Mật khẩu cũ không khớp!']);
        }
    }

    public function logout(Request $request)
    {
        if ($request->user()->tokens()->delete()) 
        {
            return response()->json(['message' => 'Đăng xuất thành công!']);
        } 
        else 
        {
            return response()->json(['message' => 'Đăng xuất thất bại!']);
        }
    }
}
