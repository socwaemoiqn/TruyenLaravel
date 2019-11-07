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
        'admin/danh-muc/ajax','admin/danh-muc/ajax/get','admin/danh-muc/ajax/add','admin/danh-muc/ajax/edit','admin/danh-muc/ajax/delete',
        'admin/the-loai/insert','admin/the-loai/ajax','admin/the-loai/ajax/edit','admin/the-loai/ajax/delete',
        'admin/tac-gia/insert','admin/tac-gia/ajax','admin/tac-gia/ajax/get','admin/tac-gia/ajax/edit','admin/tac-gia/ajax/delete',
        'admin/nhom-dich/insert','admin/nhom-dich/ajax','admin/nhom-dich/ajax/edit','admin/nhom-dich/ajax/delete',
        'admin/nhom-dich/thanh-vien/insert','admin/nhom-dich/thanh-vien/ajax','admin/nhom-dich/thanh-vien/ajax/edit','admin/nhom-dich/thanh-vien/ajax/delete',
        'admin/nhom-dich/vai-tro/insert','admin/nhom-dich/vai-tro/ajax','admin/nhom-dich/vai-tro/ajax/edit','admin/nhom-dich/vai-tro/ajax/delete'
    ];
}
