<!DOCTYPE html>
<html>
<head><title>Thêm sản phẩm</title></head>
<body>
    <h1>Form thêm mới sản phẩm</h1>
    
    <form action="{{ route('product.save') }}" method="POST">
        
        @csrf 

        <label>Tên sản phẩm:</label>
        <input type="text" name="name" placeholder="Nhập tên..." required>
        <br><br>
        
        <button type="submit">Lưu sản phẩm</button>
    </form>
</body>
</html>