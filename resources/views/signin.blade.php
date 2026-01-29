<!DOCTYPE html>
<html>
<head><title>Đăng ký tài khoản</title></head>
<body>
    <h2>Form Đăng Ký</h2>
    <form action="{{ route('check.signin') }}" method="POST">
        @csrf
        <div>
            <label>Username:</label>
            <input type="text" name="username" placeholder="VD: Hieulx">
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password">
        </div>
        <div>
            <label>Re-Password:</label>
            <input type="password" name="repass">
        </div>
        <div>
            <label>MSSV:</label>
            <input type="text" name="mssv" placeholder="Nhập đúng MSSV của bạn">
        </div>
        <div>
            <label>Lớp môn học:</label>
            <input type="text" name="lopmonhoc" placeholder="VD: 67PM1">
        </div>
        <div>
            <label>Giới tính:</label>
            <input type="text" name="gioitinh">
        </div>
        <br>
        <button type="submit">Sign In</button>
    </form>
</body>
</html>