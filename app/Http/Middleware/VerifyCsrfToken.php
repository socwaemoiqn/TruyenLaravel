<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'login','logup',
        // Danh mục
        'admin/danh-muc/*',
        // Thể loại
        'admin/the-loai/*',
     // Tác giả
        'admin/tac-gia/*',
       // Nhóm Dịch
        'admin/nhom-dich/*',
        // Nhóm dịch thành viên
        'admin/nhom-dich/thanh-vien/insert','admin/nhom-dich/thanh-vien/ajax','admin/nhom-dich/thanh-vien/ajax/edit','admin/nhom-dich/thanh-vien/ajax/delete',
       // Nhóm dịch vai trò
        'admin/nhom-dich/vai-tro/insert','admin/nhom-dich/vai-tro/ajax','admin/nhom-dich/vai-tro/ajax/edit','admin/nhom-dich/vai-tro/ajax/delete'
    ];
}
