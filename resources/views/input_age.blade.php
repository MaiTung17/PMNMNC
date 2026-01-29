<!DOCTYPE html>
<html>
<head><title>Nhập tuổi</title></head>
<body>
    <h2>Xác minh độ tuổi</h2>
    <form action="{{ route('save.age') }}" method="POST">
        @csrf
        <label>Nhập tuổi của bạn:</label>
        <input type="number" name="age" required>
        <button type="submit">Tiếp tục</button>
    </form>
</body>
</html>