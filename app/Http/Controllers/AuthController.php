<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // 1. Hàm hiển thị View SignIn
    public function signIn() {
        return view('signin');
    }

    // 2. Hàm kiểm tra dữ liệu (CheckSignIn)
    public function checkSignIn(Request $request) {
        // Lấy dữ liệu từ form
        $mssv = $request->input('mssv');
        $password = $request->input('password');
        $repass = $request->input('repass');
        
        // Thông tin sinh viên làm bài (Theo context của bạn)
        $myMssv = '0251667'; 

        // Logic kiểm tra:
        // 1. Mật khẩu phải trùng khớp với nhập lại
        // 2. MSSV phải đúng là của sinh viên làm bài
        if ($password === $repass && $mssv === $myMssv) {
            return "Đăng ký thành công!";
        } else {
            return "Đăng ký thất bại";
        }
    }
}