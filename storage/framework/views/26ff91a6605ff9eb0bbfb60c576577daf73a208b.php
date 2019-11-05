<?php if(session('mess')): ?>
  <script>alert("<?php echo e(session('mess')); ?>");</script>
  <?php echo e(Session::flush()); ?>

  <?php endif; ?> 
<?php $__env->startSection('main'); ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Danh Mục Truyện</div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" border="0">
                        <tbody>
                            <tr>
                            <form action="<?php echo e(url('admin/danh-muc/search')); ?>" method="get">
                                <td><input class="form-control" type="text"
                                    placeholder="Nhập nội dung tìm kiếm" name="key"></td>
                                <td><input class="btn btn-default" type="submit"
                                    value="Tìm kiếm"></td>
                                </form>
                                <td><a
                                    href="${pageContext.request.contextPath}/quan-tri/ql_danhmuc_truyen/them"
                                    class="btn btn-primary" data-toggle="modal"
                                    data-target="#themmoi">Thêm Mới</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped table-bordered table-hover"
                        id="dataTables-example">
                        <thead>
                            <tr>
                                <th id="btn1">STT</th>
                                <th>ID Danh mục</th>
                                <th>Tên Danh Mục</th>
                                <th>Số lượng Truyện</th>
                                <th>Trạng Thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="odd gradeX">
                                <td scope="row"><?php echo e($loop->index+1); ?></td>
                                    <td><?php echo e($item->id); ?></td>
                                    <td><?php echo e($item->ten_danh_muc); ?></td>
                                    <td class="center">4</td>
                                    <td class="center">
                                        <?php echo e($item->trang_thai); ?>

                                    </td>
                                    <td class="center">
                                        <a class="btn btn-primary btn-circle" title="Tất cả truyện" >
                                            <i class="fa fa-list-ul"></i>
                                        </a> 
                                    <a data-toggle="modal" id="<?php echo e($item->id); ?>" data-target="#sua" class="btn btn-success btn-circle danh-muc-sua" title="Chỉnh sửa danh mục"
                                        href="${pageContext.request.contextPath}/quan-tri/abcd?id=${us.id}">
                                            <i class="fa  fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger btn-circle" title="Xóa danh mục"
                                        href="${pageContext.request.contextPath}/quan-tri/ql_danhmuc_truyen/xoa?id=${us.id}"><i
                                            class="fa fa-close"></i></a></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
        
                        </tbody>
                    </table>
                   
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="modal fade" id="themmoi" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="col-lg-12">
            <div class="panel panel-green">

                <div class="panel-heading">
                    <h4>Thêm danh mục truyện mới</h4>
                </div>
                <div class="panel-body">
                    <h4>Nhập thông tin về danh mục truyện</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <form
                        action="<?php echo e(url('admin/danh-muc/insert')); ?>"
                                method="post">
                               <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label>Tên danh mục truyện</label> <input class="form-control"
 name="tenDanhMuc" placeholder="Nhập tên danh mục truyện">
                                </div>
                                <div class="form-group">
                                    <label>Giới thiệu</label> <input class="form-control"
                                   name="gioiThieu" placeholder="Nhập giới thiệu về danh mục">
                                </div>
                                <button type="submit" class="btn btn-primary">Thêm
                                    danh mục</button>
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
<div class="modal fade" id="sua" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="col-lg-12">
            <div class="panel panel-green">

                <div class="panel-heading">
                    <h4>Sửa danh mục truyện mới</h4>
                </div>
                <div class="panel-body">
                    <h4>Nhập thông tin về danh mục truyện</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <form
                                action=""
                                method="post">
                               
                                <div class="form-group">
                                    <label>ID Danh mục</label> <input class="form-control"
                                    id="id" name="id" value="" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tên danh mục truyện</label> <input class="form-control"
                                    id="tenDanhMuc" name="tenDanhMuc" placeholder="Nhập tên danh mục truyện">
                                </div>
                                <div class="form-group">
                                    <label>Giới thiệu</label> <input class="form-control"
                                    id="gioiThieu"   name="gioiThieu" placeholder="Nhập giới thiệu về danh mục">
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <div class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="trangThai" id="trangThai1" value="1" checked=""> Enable
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="trangThai" id="trangThai0" value="0"> Disable
                                    </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Sửa
                                    danh mục</button>
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
<script>
    $(document).ready(function(){
     $(document).on('click','a.danh-muc-sua',function(){
          let id =  $(this).attr('id');
          $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
              url: "admin/danh-muc/ajax",
              cache: false,
              type: "Post",
              dataType: "json",
              data: {
                  id: id
              },
              success: function(data)
              {
                   $.each(data,function(key,item){
                        $("#sua #id").val(item['id']);
                       $("#sua #tenDanhMuc").val(item['ten_danh_muc']);
                       $("#sua #gioiThieu").val(item['gioi_thieu']);
                       if(item["trang_thai"] == 1)
                       {
                         $("#trangThai1").prop("checked",true);
                       }
                       else
                         $("#trangThai0").prop("checked",true);
                   });
              },
              error: function(error)
              {

              } 
           });
     });
     $("#sua button[type=submit]").click(function(e){
        e.preventDefault();
        var trangThai = $("#sua #trangThai1").prop("checked") ? 1 : 0;
        $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
              url: "admin/danh-muc/ajax/edit",
              cache: false,
              type: "Post",
              dataType: "text",
              data: {
                  id: $("#sua #id").val(),
                  tenDanhMuc: $("#sua #tenDanhMuc").val(),
                  gioiThieu: $("#sua #gioiThieu").val(),
                  trangThai: trangThai
              },
              success: function(data)
              {
                alert(data);
              },
              error: function(error)
              {
                alert(error);
              } 
           });
     });
   });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\HocTap\xampp\htdocs\NhomTruyenLaravel\resources\views/admin/ql_danh_muc.blade.php ENDPATH**/ ?>