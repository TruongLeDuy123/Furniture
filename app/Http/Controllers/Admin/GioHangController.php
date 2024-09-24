<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DanhMucSp;
use Illuminate\Http\Request;
use App\Models\GioHang;
use App\Models\SanPham;

class GioHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return GioHang::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return GioHang::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $giohang = GioHang::findOrFail($id);
        return $giohang;
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
        $giohang = GioHang::findOrFail($id);
        $giohang->update($request->all());
        return $giohang;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $giohang = GioHang::findOrFail($id);
        $giohang->delete();
        return response()->json(['message' => 'Xóa thành công']);
    }

    public function getCartsByCustomerId($makh)
    {
        $giohang = GioHang::where('MaKh', $makh)->get();
        return $giohang;
    }
    
    public function getCartDetailByCustomerId($makh)
    {
        $giohang = GioHang::where('MaKH', $makh)->get();
        $responseData = [];

        foreach ($giohang as $item) {
            $sanpham = SanPham::findOrFail($item->MaSP);
            $dmsp = DanhMucSp::findOrFail($sanpham->MaDM);

            $responseData[] = [
                'id' => $item->id,
                'MaSP' => $item->MaSP,
                'TenSP' => $sanpham->TenSP,
                'Gia' => $sanpham->Gia,
                'MaDM' => $dmsp->id,
                'TenDM' => $dmsp->TenDM,
                'SoLuong' => $item->SoLuong,
                'MaKH' => $item->MaKH,
                'TongSL' => $sanpham->TongSL,
                'HinhAnh' => $sanpham->HinhAnh
            ];
        }
        return response()->json($responseData);
    }

    public function putQuantityByCartId(Request $request, $id)
    {
        $giohang = GioHang::findOrFail($id);
        $giohang->update([
            'SoLuong' => intval($request->SoLuong + $giohang->SoLuong),
        ]);
        return $giohang;
    }

    public function insertCart(Request $request)
    {
        $giohang = GioHang::where("MaSP", $request->MaSP)
            ->where("MaKH", $request->MaKH)
            ->first();
        if ($giohang == null) {
            return $this->store($request);
        } else {
            return $this->putQuantityByCartId($request, $giohang->id);
        }
    }
}
