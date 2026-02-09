<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // 1. Danh sách (Chỉ lấy các mục chưa bị xóa mềm)
    public function index() {
        $categories = Category::where('is_delete', 0)->get();
        return view('category.index', compact('categories'));
    }

    // 2. Form thêm mới
    public function create() {
        // Lấy danh sách danh mục để chọn làm cha (trừ những cái đã xóa)
        $categories = Category::where('is_delete', 0)->get();
        return view('category.create', compact('categories'));
    }

    // 3. Lưu bản ghi
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            // parent_id phải tồn tại trong bảng categories hoặc là null
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        Category::create($request->all());

        return redirect()->route('category.index')->with('success', 'Thêm mới thành công!');
    }

    // 4. Form sửa
    public function edit($id) {
        $category = Category::find($id);
        if (!$category) return redirect()->route('category.index');

        // Lấy danh sách danh mục cha, TRỪ CHÍNH NÓ ra (để tránh chọn mình làm cha của mình)
        $categories = Category::where('is_delete', 0)->where('id', '!=', $id)->get();

        return view('category.edit', compact('category', 'categories'));
    }

    // 5. Cập nhật
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|max:255',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        // LOGIC CHỐNG VÒNG LẶP (Cơ bản)
        // 1. Không thể chọn chính mình làm cha
        if ($request->parent_id == $id) {
            return back()->withErrors(['parent_id' => 'Danh mục không thể là cha của chính nó!']);
        }
        
        // 2. (Nâng cao) Kiểm tra xem parent_id được chọn có phải là con cháu của $id hiện tại không?
        // Nếu $request->parent_id là con của $id -> Lỗi.
        // (Để đơn giản cho bài thực hành, ta tạm dừng ở mức check chính mình. 
        // Nếu muốn check sâu hơn cần đệ quy).

        $category = Category::find($id);
        $category->update($request->all());

        return redirect()->route('category.index')->with('success', 'Cập nhật thành công!');
    }

    // 6. Xóa mềm (Is Delete = 1)
    public function destroy($id) {
        $category = Category::find($id);
        if ($category) {
            $category->is_delete = 1; // Đánh dấu là đã xóa
            $category->save();
        }
        return redirect()->route('category.index')->with('success', 'Đã xóa danh mục!');
    }
}