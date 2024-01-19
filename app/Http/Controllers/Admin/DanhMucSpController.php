<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhMucSp;
use App\Models\SanPham;

class DanhMucSpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DanhMucSp::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return DanhMucSp::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dmsp = DanhMucSp::findOrFail($id);
        // if (!$dmsp) {
        //     return response()->json(['message' => 'Không tìm thấy danh mục sản phẩm'], 404);
        // }
        return $dmsp;
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
        $dmsp = DanhMucSp::findOrFail($id);
        // $dmsp = DanhMucSp::find($id);
        // if (!$dmsp) {
        //     return response()->json(['message' => 'Không tìm thấy danh mục sản phẩm'], 404);
        // }
        $dmsp->update($request->all());
        return $dmsp;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dmsp = DanhMucSp::findOrFail($id);
        // if (!$dmsp) {
        //     return response()->json(['message' => 'Không tìm thấy danh mục sản phẩm'], 404);
        // }
        $dmsp->delete();
        return response()->json(['message' => 'Xóa thành công']);
    }

    public function productPicforCategory()
    {
        $dmsp = DanhMucSp::all();
        $responseData = [];

        foreach ($dmsp as $item) {
            $sanpham = SanPham::where('MaDM', $item->id)->inRandomOrder()->take(1)->get();

            $responseData[] = [
                'id' => $item->id,
                'TenDM' => $item->TenDM,
                'HinhAnh' => $sanpham[0]->HinhAnh
            ];
        }
        return $responseData;
    }
}
