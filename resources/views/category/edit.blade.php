<!DOCTYPE html>
<html>
<head><title>Sửa Danh mục</title></head>
<body>
    <h1>Cập nhật Danh mục: {{ $category->name }}</h1>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        {{-- Form sửa thì không cần @method('PUT') nếu route bạn để là POST, 
             nhưng chuẩn RESTful thì nên dùng PUT. Ở bài trước mình hướng dẫn route POST nên giữ nguyên POST nhé. --}}
        
        <p>
            <label>Tên danh mục (*):</label><br>
            <input type="text" name="name" value="{{ $category->name }}" required style="width: 300px;">
        </p>

        <p>
            <label>Danh mục cha:</label><br>
            <select name="parent_id" style="width: 300px;">
                <option value="">--- Là danh mục gốc ---</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" 
                        {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            <br><i>(Lưu ý: Không thể chọn chính nó làm cha)</i>
        </p>

        <p>
            <label>Mô tả:</label><br>
            <textarea name="description" rows="4" cols="40">{{ $category->description }}</textarea>
        </p>

        <p>
            <label>Trạng thái:</label>
            <select name="is_active">
                <option value="1" {{ $category->is_active == 1 ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ $category->is_active == 0 ? 'selected' : '' }}>Tạm ẩn</option>
            </select>
        </p>

        <button type="submit">Cập nhật</button>
        <a href="{{ route('category.index') }}">Hủy</a>
    </form>
</body>
</html>