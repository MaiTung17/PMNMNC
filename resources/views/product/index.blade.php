<!DOCTYPE html>
<html>
<head><title>Quản lý Sản phẩm</title></head>
<body>
    <h1>Danh sách Sản phẩm</h1>
    <a href="{{ route('product.create') }}"><button>+ Thêm mới Sản phẩm</button></a>
    <a href="{{ url('/') }}">Về trang chủ</a>
    <br><br>

    @if(session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên SP</th>
                <th>Danh mục</th>
                <th>Giá gốc</th>
                <th>Giá KM</th>
                <th>Tồn kho</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->category ? $p->category->name : '--- Không có ---' }}</td>
                <td>{{ number_format($p->price) }} đ</td>
                <td>{{ $p->sale_price ? number_format($p->sale_price) . ' đ' : '-' }}</td>
                <td>{{ $p->stock }}</td>
                <td>
                    <a href="{{ route('product.edit', $p->id) }}">Sửa</a> | 
                    <a href="{{ route('product.destroy', $p->id) }}" onclick="return confirm('Xóa SP này?')">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>