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
    // --- PHẦN BỔ SUNG CHO COMMIT 2 ---
    
    // 3. View nhập tuổi
    public function inputAge() {
        return view('input_age');
    }

    // 4. Lưu tuổi vào Session
    public function saveAge(Request $request) {
        $age = $request->input('age');
        // Lưu vào session
        session(['age' => $age]);
        
        return redirect()->route('admin.page'); // Chuyển hướng sang trang test middleware
    }

    // 5. Trang Admin (Chỉ dành cho >= 18 tuổi)
    public function adminPage() {
        return "Chào mừng! Bạn đã trên 18 tuổi và được phép truy cập.";
    }
}