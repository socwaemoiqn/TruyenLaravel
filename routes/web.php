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
        Route::post("/ajax/delete",'Admin\DanhMucController@xoa'); // ajax xóa dữ liệu danh mục
    });

    Route::prefix('the-loai')->group(function () {
        Route::get("/", 'Admin\TheLoaiController@theLoaiPage');
        Route::get("/search", 'Admin\TheLoaiController@search');
        Route::post("/insert", 'Admin\TheLoaiController@them');
        Route::post("/ajax", 'Admin\TheLoaiController@ajax'); // ajax gét dữ liệu lên form sửa 
        Route::post("/ajax/edit",'Admin\TheLoaiController@sua'); // ajax sửa dữ liệu 
        Route::post("/ajax/delete",'Admin\TheLoaiController@xoa'); // ajax xóa dữ liệu 
    });


    Route::prefix('tac-gia')->group(function () {
        Route::get("/", 'Admin\TacGiaController@tacGiaPage');
        Route::get("/search", 'Admin\TacGiaController@search');
        Route::post("/insert", 'Admin\TacGiaController@them');
        Route::post("/ajax", 'Admin\TacGiaController@ajax'); // ajax gét dữ liệu lên form sửa 
        Route::post("/ajax/edit",'Admin\TacGiaController@sua'); // ajax sửa dữ liệu 
        Route::post("/ajax/delete",'Admin\TacGiaController@xoa'); // ajax xóa dữ liệu 
    });
    Route::prefix('nhom-dich')->group(function () {
        Route::get("/", 'Admin\NhomDichController@nhomDichPage');
        Route::get("/search", 'Admin\NhomDichController@search');
        Route::post("/insert", 'Admin\NhomDichController@them');
        Route::post("/ajax", 'Admin\NhomDichController@ajax'); // ajax gét dữ liệu lên form sửa
        Route::post("/ajax/edit",'Admin\NhomDichController@sua'); // ajax sửa dữ liệu
        Route::post("/ajax/delete",'Admin\NhomDichController@xoa'); // ajax xóa dữ liệu 

        Route::prefix('thanh-vien')->group(function () {
            Route::get("/", 'Admin\NhomDichThanhVienController@thanhVienPage');
            Route::get("/search", 'Admin\NhomDichThanhVienController@search');
            Route::post("/insert", 'Admin\NhomDichThanhVienController@them');
            Route::post("/ajax", 'Admin\NhomDichThanhVienController@ajax'); // ajax gét dữ liệu lên form sửa
            Route::post("/ajax/edit",'Admin\NhomDichThanhVienController@sua'); // ajax sửa dữ liệu 
            Route::post("/ajax/delete",'Admin\NhomDichThanhVienController@xoa'); // ajax xóa dữ liệu 
        });
        Route::prefix('vai-tro')->group(function () {
            Route::get("/", 'Admin\NhomDichController@vaiTroPage');
            Route::get("/search", 'Admin\NhomDichController@search');
            Route::post("/insert", 'Admin\NhomDichController@them');
            Route::post("/ajax", 'Admin\NhomDichController@ajax'); // ajax gét dữ liệu lên form sửa
            Route::post("/ajax/edit",'Admin\NhomDichController@sua'); // ajax sửa dữ liệu 
            Route::post("/ajax/delete",'Admin\NhomDichController@xoa'); // ajax xóa dữ liệu 
        });
    });
    
    Route::prefix('truyen')->group(function () {
        Route::get("/", 'Admin\TruyenController@truyenPage');
    });
});
//
Route::post('/login','HomeController@login'); // Xử lý đăng ký
Route::post('/logup','HomeController@logup'); // Xử lí đăng ký