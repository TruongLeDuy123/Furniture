<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoaDon;
use App\Http\Controllers\Admin\KhachHangController;
use App\Http\Controllers\Admin\NhanVienController;
use App\Http\Controllers\Admin\KhuyenMaiController;
use App\Models\Cthd;
use App\Models\SanPham;

class HoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HoaDon::all();
        // return HoaDon::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return HoaDon::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hoadon = HoaDon::findOrFail($id);
        return $hoadon;
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
        $hoadon = HoaDon::findOrFail($id);
        $hoadon->update([
            "TTDH"=> $request->input("TTDH"),
            "TTTT"=> $request->input("TTTT"),
        ]);
        return $hoadon;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function paginate($pageSize)
    {
        return HoaDon::paginate($pageSize);
    }
    public function getBillsByOrderStatus($ttdh)
    {
        if($ttdh == "all") {
            return HoaDon::paginate(10);
        }
        $hoadon = HoaDon::where('TTDH', $ttdh)->paginate(10);
        return $hoadon;
    }
    public function getBillsByPaymentStatus(Request $request, $status)
    {
        if ($status == "all") {
            $bills = HoaDon::all();
        } else {
            // Assuming 'TTTT' is the column in your table for payment status
            $bills = HoaDon::where('TTTT', $status)->get();
        }

        // You may want to customize the response format based on your needs
        return $bills;
    }

    public function getLastPage($ttdh)
    {
        if($ttdh == "all") {
            return HoaDon::paginate(10)->lastPage();
        }
        $hoadon = HoaDon::where('TTDH', $ttdh);
        return $hoadon->paginate(10)->lastPage();
    }

    public function getBillsByCustomerId($makh)
    {
        $bills = Hoadon::where('MaKH', $makh)->with('cthd.sanpham')->get();
        return $bills;
    }
}
