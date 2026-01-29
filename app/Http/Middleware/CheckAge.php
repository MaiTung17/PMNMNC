<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Lấy tuổi từ session
    $age = session('age');

    // Kiểm tra: Nếu chưa có tuổi, hoặc không phải số, hoặc nhỏ hơn 18
    if (!$age || !is_numeric($age) || $age < 18) {
        // Trả về text theo yêu cầu đề bài
        return response("Không được phép truy cập", 403);
    }
    // Nếu thoả mãn thì cho đi tiếp
        return $next($request);
    }
}
