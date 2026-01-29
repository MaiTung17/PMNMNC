<!DOCTYPE html>
<html>
<head>
    <title>Trang chủ - Project</title>
    <style>
        body { font-family: sans-serif; padding: 20px; line-height: 1.6; }
        ul { list-style-type: none; padding: 0; }
        li { margin-bottom: 10px; }
        a { text-decoration: none; color: blue; font-weight: bold; font-size: 18px; }
        a:hover { text-decoration: underline; color: red; }
        h2 { border-bottom: 2px solid #ccc; padding-bottom: 5px; }
    </style>
</head>
<body>
    <h1>HOME </h1>
    
    <h2>Phần 1: Route & View cơ bản</h2>
    <ul>
        <li><a href="{{ route('product.index') }}"> Quản lý sản phẩm (Product)</a></li>
        <li><a href="{{ url('/banco/8') }}"> Bàn cờ vua 8x8</a></li>
        <li><a href="{{ url('/sinhvien') }}"> Thông tin sinh viên</a></li>
    </ul>

    <h2>Phần 2: Commit 1 (Đăng ký & Auth)</h2>
    <ul>
        <li><a href="{{ route('signin') }}"> Form Đăng ký (SignIn)</a></li>
    </ul>

    <h2>Phần 3: Commit 2 (Middleware & Session)</h2>
    <ul>
        <li><a href="{{ url('/input-age') }}"> Kiểm tra tuổi (Input Age)</a></li>
        
        <li><a href="{{ url('/admin') }}"> Vào thử trang Admin (Test Middleware)</a></li>
    </ul>
</body>
</html>