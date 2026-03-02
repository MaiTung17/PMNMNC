<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // 1. Danh sách sản phẩm (chỉ lấy SP chưa xóa mềm)
    public function index(Request $request) {
        // Có thể thêm tính năng tìm kiếm theo keyword nếu muốn
        $query = Product::where('is_delete', 0);
        
        if ($request->has('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        $products = $query->get();
        return view('product.index', compact('products'));
    }

    // 2. Form thêm mới
    public function create() {
        // Lấy danh mục để hiển thị ở thẻ <select>
        $categories = Category::where('is_delete', 0)->get();
        return view('product.create', compact('categories'));
    }

    // 3. Xử lý lưu SP mới
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric|min:0',
            // sale_price: nullable, số >= 0 và lte:price (nhỏ hơn hoặc bằng price)
            'sale_price' => 'nullable|numeric|min:0|lte:price',
            'stock' => 'required|integer|min:0'
        ], [
            // Custom thông báo lỗi tiếng Việt cho dễ hiểu
            'sale_price.lte' => 'Giá khuyến mãi không được lớn hơn giá gốc!'
        ]);

        Product::create($request->all());
        return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    // 4. Form cập nhật
    public function edit($id) {
        $product = Product::find($id);
        if (!$product) return redirect()->route('product.index');

        $categories = Category::where('is_delete', 0)->get();
        return view('product.edit', compact('product', 'categories'));
    }

    // 5. Cập nhật dữ liệu
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lte:price',
            'stock' => 'required|integer|min:0'
        ]);

        $product = Product::find($id);
        $product->update($request->all());

        return redirect()->route('product.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    // 6. Xóa mềm
    public function destroy($id) {
        $product = Product::find($id);
        if ($product) {
            $product->is_delete = 1;
            $product->save();
        }
        return redirect()->route('product.index')->with('success', 'Đã xóa sản phẩm!');
    }
}