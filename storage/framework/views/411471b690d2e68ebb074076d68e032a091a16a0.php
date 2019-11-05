<?php $__env->startSection('main'); ?>
<div class="col-lg-12">
    <h1 class="page-header">Quản lý</h1>
</div>
<!-- /.col-lg-12 -->
</div>
<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">Tác Giả</div>
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
                            <th>ID Tác Giả</th>
                            <th>Tên Tác Giả</th>
                            <th>Số lượng Truyện</th>
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
        <div class="panel panel-green">

            <div class="panel-heading">
                <h4>Thêm Thể Loại Truyện Mới</h4>
            </div>
            <div class="panel-body">
                <h4>Nhập thông tin về thể loại truyện</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <form
                            action="${pageContext.request.contextPath}/quan-tri/ql_danhmuc_truyen/them"
                            method="post">
                            <div class="form-group">
                                <label>Tên thể loại truyện</label> <input class="form-control"
                                    name="tenDanhMuc" placeholder="Nhập tên danh mục truyện">
                            </div>
                            <div class="form-group">
                                <label>Giới thiệu</label> <input class="form-control"
                                    name="gioiThieu" placeholder="Nhập giới thiệu về danh mục">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm
                                thể loại</button>
                        </form>
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

<?php echo $__env->make('layout.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\HocTap\xampp\htdocs\NhomTruyenLaravel\resources\views/admin/ql_tac_gia.blade.php ENDPATH**/ ?>