<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use Illuminate\Support\Carbon;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return SanPham::all();
        return SanPham::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return SanPham::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sanpham = SanPham::findOrFail($id);
        // if (!$sanpham) {
        //     return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
        // }
        return $sanpham;
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
        $sanpham = SanPham::findOrFail($id);
        // $sanpham = DanhMucSp::find($id);
        // if (!$sanpham) {
        //     return response()->json(['message' => 'Không tìm thấy danh mục sản phẩm'], 404);
        // }
        $sanpham->update($request->all());
        return $sanpham;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sanpham = SanPham::findOrFail($id);
        // if (!$sanpham) {
        //     return response()->json(['message' => 'Không tìm thấy danh mục sản phẩm'], 404);
        // }
        $sanpham->delete();
        return response()->json(['message' => 'Xóa thành công']);
    }

    public function getThuongHieu()
    {
        $brands = SanPham::select('ThuongHieu')->distinct()->get();

        return response()->json(['brands' => $brands]);
    }
    public function getProductsByCategoryId($id)
    {
        $sanpham = SanPham::where('MaDM', $id)->get();
        return $sanpham;
        // return response()->json(['products' => $sanpham]);
    }

    public function getLastPage($pageSize)
    {
        return SanPham::paginate($pageSize)->lastPage();
    }

    public function paginate($pageSize)
    {
        return SanPham::paginate($pageSize);
    }

    public function searchProducts(Request $request)
    {
        $keyword = $request->input('keyword');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');
        $thieu = $request->input('thieu');
        $dmuc = $request->input('dmuc');
        $query = SanPham::query();
        if ($keyword) {
            $query->where('TenSP', 'LIKE', '%' . $keyword . '%');
        }
        if ($minPrice !== null && $maxPrice !== null) {
            $query->whereBetween('Gia', [$minPrice, $maxPrice]);
        }

        // if($thieu !==null){
        //     $query->where('ThuongHieu', '=',  $thieu);
        // }
        $tHieuArray = explode(',', $thieu);
        if ($thieu !== null) {
            $query->whereIn('ThuongHieu', $tHieuArray);
        }
        if ($dmuc !== null) {
            $query->where('MaDM', '=',  $dmuc);
        }
        $searchProducts = $query->paginate(12);
        return response()->json($searchProducts);
    }

    public function decrement($id, $num)
    {
        $product = SanPham::findOrFail($id);
        if ($product->TongSL >= $num) {
            $product->TongSL = $product->TongSL - $num;
            $product->update(['TongSL', $product->TongSL]);
        }
        return $product;
    }

    public function layGiaLonNhat()
    {
        $maxPrice = SanPham::max('Gia');
        return response()->json(['max_Price' => $maxPrice]);
    }

    public function getRandomProducts($count)
    {
        $randomProducts = SanPham::inRandomOrder()->take($count)->get();
        return $randomProducts;
    }

    public function getSimilarProducts($carId, $count)
    {
        $randomProducts = SanPham::where('MaDM', $carId)
            ->inRandomOrder()->limit($count)->get();
        return $randomProducts;
    }

    public function getRandomPic($madm)
    {
        $randomProducts = SanPham::where('MaDM', $madm)->inRandomOrder()->take(1)->get();
        return $randomProducts;
    }
}
