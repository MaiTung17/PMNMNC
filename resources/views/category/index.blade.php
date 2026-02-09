<!DOCTYPE html>
<html>
<head>
    <title>Quản lý Danh mục</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 5px 10px; text-decoration: none; border: 1px solid #ccc; background: #eee; color: black;}
        .btn-green { background: #4CAF50; color: white; border: none; }
        .btn-red { color: red; }
    </style>
</head>
<body>
    <h1>Danh sách Danh mục</h1>
    
    <a href="{{ route('category.create') }}" class="btn btn-green">+ Thêm mới</a>
    <a href="{{ url('/') }}" class="btn">Về trang chủ</a>
    
    @if(session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Danh mục cha</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
                <td>
                    {{-- Nếu có cha thì hiện tên cha, không thì hiện 'Gốc' --}}
                    {{ $cat->parent ? $cat->parent->name : '--- Danh mục gốc ---' }}
                </td>
                <td>
                    @if($cat->is_active)
                        <span style="color:green">Hoạt động</span>
                    @else
                        <span style="color:gray">Ẩn</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('category.edit', $cat->id) }}" class="btn">Sửa</a>
                    <a href="{{ route('category.destroy', $cat->id) }}" 
                       onclick="return confirm('Bạn chắc chắn muốn xóa danh mục này?')" 
                       class="btn btn-red">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>