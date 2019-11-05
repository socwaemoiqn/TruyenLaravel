<?php
// Client
Route::get('/','HomeController@indexPage'); // Trang chủ
Route::get('/index','HomeController@indexPage'); // Trang chủ
Route::get('/info','InfoController@infoPage'); // Trang thông tin truyện
Route::get('/read','ReadController@readPage'); // Trang Đọc truyện
Route::get('/danhmuc','DanhMucController@danhMucPage'); // Trang danh mục
Route::get('/theloai','TheLoaiController@theLoaiPage'); // Trang thể loại
Route::get('/search','SearchController@searchPage'); // Trang tìm kiếm
Route::get('/contact','ContactController@contactPage'); // Trang thể loại
Route::get('/term','TermController@termPage'); // Trang tìm kiếm
// 
// Member
Route::prefix('team')->group(function () {
    Route::get("/", 'Translator\HomeController@indexPage');

    Route::prefix('member')->group(function () {
        Route::get("/", 'Translator\Member\HomeController@indexPage');
    });
});
//
// Admin
Route::prefix('admin')->group(function () {
    Route::get("/", 'Admin\HomeController@indexPage');

    Route::prefix('danh-muc')->group(function () {
        Route::get("/", 'Admin\DanhMucController@danhMucPage');
        Route::get("/search", 'Admin\DanhMucController@search');
        Route::post("/insert", 'Admin\DanhMucController@them');
        Route::post("/ajax", 'Admin\DanhMucController@ajax'); // ajax gét dữ liệu lên form sửa danh mục
        Route::post("/ajax/edit",'Admin\DanhMucController@sua'); // ajax sửa dữ liệu danh mục
    });

    Route::get("/the-loai", 'Admin\TheLoaiController@theLoaiPage');
    Route::get("/tac-gia", 'Admin\TacGiaController@tacGiaPage');
    Route::get("/nhom-dich", 'Admin\NhomDichController@nhomDichPage');
    
    Route::prefix('truyen')->group(function () {
        Route::get("/", 'Admin\TruyenController@truyenPage');
    });
});
//
Route::post('/login','HomeController@login'); // Xử lý đăng ký
Route::post('/logup','HomeController@logup'); // Xử lí đăng ký