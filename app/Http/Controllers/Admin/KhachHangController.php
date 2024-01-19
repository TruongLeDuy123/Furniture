<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KhachHangController extends Controller
{
    public function index()
    {
        // $customers = KhachHang::all();
        $customers = KhachHang::paginate(10);
        return $customers;
    }

    public function show($id)
    {
        $customer = KhachHang::findOrFail($id);
        return $customer;
    }

    public function store(Request $request)
    {
        $todayDate = Carbon::now()->format('d-m-Y');

        $validated = $request->validate([
            'HoTen' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:khachhang'],
            // 'Password' => ['required', 'string', 'min:8'],
            'SDT' => ['required', 'string', 'min:10'],
        ]);
        // NhanVien::create([
        //     'HoTen' => $request->HoTen,
        //     'Email' => $request->email,
        //     'Password' => $request->password,
        //     'SDT' => $request->sdt,
        //     'DiaChi' => $request->DChi,
        //     'ThanhPho' => $request->TPho,
        //     'NgayTao' => $todayDate,
        //     'GioiTinh' => $request->GTinh,
        // ]);
        return KhachHang::create($request->all());
        // return redirect('/staff_manager')->with('message', 'Tạo thông tin nhân viên thành công');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'HoTen' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255', Rule::unique('khachhang')->ignore($id)],
            // 'Password' => ['required', 'string', 'min:8'],
            'SDT' => ['required', 'string', 'min:10'],
        ]);
        $khachhang = KhachHang::findOrFail($id);
        $user = User::where('email', $khachhang->Email)->first();
        $khachhang->update($request->all());
        $user->update(['email' => $khachhang->Email]);
        return $khachhang;
    }

    public function destroy($id)
    {
        $customer = KhachHang::findOrFail($id);
        $customer->delete();
        return response()->json(['message' => 'Xóa thành công']);
    }

    public function getCustomersByEmail($email)
    {
        $customer = KhachHang::where('Email', $email)->first();
        return $customer;
    }

    public function getLastPage($pageSize)
    {
        return KhachHang::paginate($pageSize)->lastPage();
    }
    public function getNameById($id)
    {
        // Lấy thông tin khách hàng từ database
        $customer = KhachHang::findOrFail($id);

        // Kiểm tra xem khách hàng có tồn tại không
        if ($customer) {
            // Trả về tên khách hàng
            return response()->json(['customer_name' => $customer->HoTen]);
        } else {
            // Trả về thông báo nếu không tìm thấy khách hàng
            return response()->json(['message' => 'Không tìm thấy khách hàng.'], 404);
        }
    }
}
