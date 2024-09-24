<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class NhanVienController extends Controller
{
    public function index()
    {
        $staffs = NhanVien::all();
        return $staffs;
    }

    public function show($id)
    {
        $staff = NhanVien::findOrFail($id);
        return $staff;
    }

    public function store(Request $request)
    {
        $todayDate = Carbon::now()->format('d-m-Y');

        $validated = $request->validate([
            'HoTen' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'Password' => ['required', 'string', 'min:8'],
            'SDT' => ['required', 'string', 'min:10'],
        ]);
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $staff = NhanVien::create([
            'HoTen' => $request->HoTen,
            'Email' => $request->email,
            'SDT' => $request->sdt,
            'DiaChi' => $request->DChi,
            'ThanhPho' => $request->TPho,
            'NgayTao' => $todayDate,
            'GioiTinh' => $request->GTinh,
        ]);

        return response()->json([
            'user' => $user,
            'staff' => $staff
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'HoTen' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255', Rule::unique('nhanvien')->ignore($id)],
            'Password' => ['required', 'string', 'min:8'],
            'SDT' => ['required', 'string', 'min:10'],
        ]);

        $nhanvien = NhanVien::findOrFail($id);
        $nhanvien->update($request->all());
        return $nhanvien;
    }

    public function destroy($id)
    {
        $staff = NhanVien::findOrFail($id);
        $staff->delete();
        return response()->json(['message', 'Xóa thành công']);
    }

    public function getStaffsByEmail($email)
    {
        $staff = NhanVien::where('Email', $email)->first();
        return $staff;
    }
    public function getNameById($id){
        // Lấy thông tin nhân viên từ database
          $staff = NhanVien::findOrFail($id);
 
         // Kiểm tra xem nhân viên có tồn tại không
         if ($staff) {
             // Trả về tên nhân viên
             return response()->json(['staff_name' => $staff->HoTen]);
         } else {
             // Trả về thông báo nếu không tìm thấy nhân viên
             return response()->json(['message' => 'Không tìm thấy nhân viên.'], 404);
         }
     }
}
