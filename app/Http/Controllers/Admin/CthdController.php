<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cthd;
use Illuminate\Support\Facades\DB;

class CthdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cthd::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Cthd::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cthd = Cthd::findOrFail($id);
        return $cthd;
    }

    public function getBillDetailsByBillId($mahd)
    {
        $cthd = Cthd::where('MaHD', $mahd)->get();
        return $cthd;
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
        //
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

    public function getTopProducts()
    {
        $topProducts = Cthd::select('MaSP', DB::raw('SUM(SoLuong) as total_quantity'))
            ->groupBy('MaSP')
            ->orderByDesc('total_quantity')
            ->limit(10)
            ->get();

        return response()->json(['data' => $topProducts]);
    }
}
