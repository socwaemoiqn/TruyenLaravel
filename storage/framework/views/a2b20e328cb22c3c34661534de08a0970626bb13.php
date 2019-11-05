<?php $__env->startSection('main'); ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Nhóm dịch</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover"
                        border="0">
                        <tbody>
                            <tr>
                                <td><input class="form-control" type="text"
                                    placeholder="Nhập nội dung tìm kiếm"></td>
                                <td><input class="btn btn-default" type="submit"
                                    value="Tìm kiếm"></td>

                                <td><a href="" class="btn btn-primary" data-toggle="modal"
                                    data-target="#themmoi">Thêm Mới</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            Code quản lý nhóm dịch
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\HocTap\xampp\htdocs\NhomTruyenLaravel\resources\views/admin/ql_nhom_dich.blade.php ENDPATH**/ ?>