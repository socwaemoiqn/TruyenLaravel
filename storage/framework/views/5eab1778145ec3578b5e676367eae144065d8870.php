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
            <div class="panel-heading">Truyện</div>
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
                    <table class="table table-striped table-bordered table-hover"
                        id="dataTables-example">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình Ảnh</th>
                                <th>Tên Truyện</th>
                                <th>Tên Tác Giả</th>
                                <th>Danh mục</th>
                                <th>Số Chương</th>
                                <th>Lượt Xem</th>
                                <th>Trạng Thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            

                        </tbody>
                    </table>
                </div>
                <div class="grid_3 grid_5 agileits">
                    
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="themmoi" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="col-lg-12">
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <h4>Thêm truyện mới</h4>
                </div>
                <div class="panel-body">
                    <h4>Nhập thông tin về truyện</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\HocTap\xampp\htdocs\NhomTruyenLaravel\resources\views/admin/ql_truyen.blade.php ENDPATH**/ ?>