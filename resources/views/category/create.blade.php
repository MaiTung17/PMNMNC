<!DOCTYPE html>
<html>
<head><title>Thêm Danh mục</title></head>
<body>
    <h1>Thêm mới Danh mục</h1>
    
    {{-- Hiển thị lỗi nếu có --}}
    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        
        <p>
            <label>Tên danh mục (*):</label><br>
            <input type="text" name="name" required style="width: 300px;">
        </p>

        <p>
            <label>Danh mục cha:</label><br>
            <select name="parent_id" style="width: 300px;">
                <option value="">--- Là danh mục gốc ---</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Mô tả:</label><br>
            <textarea name="description" rows="4" cols="40"></textarea>
        </p>

        <p>
            <label>Trạng thái:</label>
            <select name="is_active">
                <option value="1">Hoạt động</option>
                <option value="0">Tạm ẩn</option>
            </select>
        </p>

        <button type="submit">Lưu lại</button>
        <a href="{{ route('category.index') }}">Hủy</a>
    </form>
</body>
</html>