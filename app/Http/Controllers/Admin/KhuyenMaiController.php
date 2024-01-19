<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhuyenMai;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class KhuyenMaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return KhuyenMai::all();
        // Phân trang
        // return KhuyenMai::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $todayDate = Carbon::now()->format('d-m-Y');

        // $validated = $request->validate([
        //     'TenKM' => ['required', 'string', 'max:255', 'unique:khuyenmai'],
        //     'NgayBD' => ['required', 'date'],
        //     'NgayKT' => ['required', 'date'],
        //     'PhanTramKM' => ['required', 'number'],
        //     'DinhMuc' => ['required', 'number'],
        //     'ToiDa' => ['required', 'number'],

        // ]);
        return KhuyenMai::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $khuyenmai = KhuyenMai::findOrFail($id);
        return $khuyenmai;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $khuyenmai = KhuyenMai::findOrFail($id);
        $khuyenmai->update($request->all());
        return $khuyenmai;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $khuyenmai = KhuyenMai::findOrFail($id);
        $khuyenmai->delete();
        return response()->json(['message' => 'Xóa thành công']);
    }

    public function getDiscountsByType($type)
    {
        $todayDate = Carbon::now()->format('Y-m-d');

        switch ($type) {
            case 0:
                $khuyenmai = KhuyenMai::all();
                break;
            case 1: //Chưa bắt đầu
                $khuyenmai = KhuyenMai::where('NgayBD', '>', $todayDate)->get();
                break;
            case 2: //Đang áp dụng
                $khuyenmai = KhuyenMai::where('NgayBD', '<=', $todayDate)
                    ->where('NgayKT', '>=', $todayDate)->get();
                break;
            case 3: //Hết hạn 
                $khuyenmai = KhuyenMai::where('NgayKT', '<', $todayDate)->get();
                break;
        }
        return $khuyenmai;
    }

    public function getNameById($id)
    {
        // Lấy thông tin khuyến mãi từ database
        $discount = KhuyenMai::findOrFail($id);

        // Kiểm tra xem khuyến mãi có tồn tại không
        if ($discount) {
            // Trả về tên khuyến mãi
            return response()->json(['discount_name' => $discount->TenKM]);
        } else {
            // Trả về thông báo nếu không tìm thấy khuyến mãi
            return response()->json(['message' => 'Không tìm thấy khuyến mãi.'], 404);
        }
    }
}
