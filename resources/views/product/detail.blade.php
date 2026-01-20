<!DOCTYPE html>
<html>
<head><title>Chi tiết sản phẩm</title></head>
<body>
    <h1>Thông tin sản phẩm</h1>
    <p>Mã sản phẩm (ID): <strong>{{ $id }}</strong></p>
    <p>Tên sản phẩm: <i>Sản phẩm mẫu (Dữ liệu cứng)</i></p>
    <p>Giá bán: <i>1.000.000 VNĐ</i></p>
    <hr>
    <a href="{{ route('product.index') }}">Quay lại danh sách</a>
</body>
</html>