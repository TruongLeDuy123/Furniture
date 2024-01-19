<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;

class ThanhToanController extends Controller
{
    public function updateQuantity(Request $request, $productId)
    {
        $product = SanPham::findOrFail($productId);

        // Kiểm tra xem request có chứa số lượng không
        if ($request->has('quantity')) {
            $newQuantity = $request->input('quantity');

            // Kiểm tra xem có đủ số lượng sản phẩm để cập nhật hay không
            if ($newQuantity <= $product->TongSL) {
                // Cập nhật số lượng
                $product->TongSL -= $newQuantity;
                $product->save();

                return response()->json(['message' => 'Số lượng đã được cập nhật thành công.', $product]);
            } else {
                return response()->json(['error' => 'Không đủ số lượng sản phẩm.'], 400);
            }
        }

        return response()->json(['error' => 'Thiếu thông tin số lượng.'], 400);
    }
}
