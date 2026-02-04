<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ở đây định nghĩa tất cả các đường dẫn cho website của bạn.
|
*/

// --- BÀI 1 & 2: TRANG CHỦ & ROUTING CƠ BẢN ---
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return 'Chào mừng đến với Laravel';
});

Route::get('/about', function () {
    // Trả về thông tin cá nhân (Họ tên, Lớp, MSSV)
    return 'Họ tên: Nguyễn Văn A - Lớp: WD1801 - MSSV: PS12345';
});

Route::get('/contact', function () {
    // Trả về file resources/views/contact.blade.php
    return view('contact');
});


// --- BÀI 3: DYNAMIC ROUTE & CALCULATION ---
// Tính tổng: ví dụ /tong/5/10
Route::get('/tong/{a}/{b}', function ($a, $b) {
    $sum = $a + $b;
    return "Tổng của $a và $b là: $sum";
});

// Thông tin sinh viên: age có dấu ? là không bắt buộc
Route::get('/sinh-vien/{name}/{age?}', function ($name, $age = 20) {
    return "Sinh viên: $name - Tuổi: $age";
});


// --- BÀI 4: ROUTE GROUP & VALIDATION ---
// Nhóm các route admin
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return "Chào mừng Admin";
    });

    Route::get('/users', function () {
        return "Danh sách người dùng";
    });
});

// Kiểm tra ngày tháng với ràng buộc Regex
Route::get('/check-date/{day}/{month}/{year}', function ($day, $month, $year) {
    return "Ngày bạn nhập là: $day/$month/$year (Hợp lệ)";
})->where([
    'day'   => '[1-9]|[12][0-9]|3[01]', 
    'month' => '[1-9]|1[0-2]',          
    'year'  => '[0-9]{4}'               
]);