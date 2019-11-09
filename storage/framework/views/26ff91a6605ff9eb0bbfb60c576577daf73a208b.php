<?php if(session('mess')): ?>
    <script>alert("<?php echo e(session('mess')); ?>");</script>
    <?php echo e(Session::flush()); ?>

<?php endif; ?> 
<?php $__env->startSection('main'); ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý Danh Mục</h1>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"></div>
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
                                    href=""
                                    class="btn btn-primary" data-toggle="modal"
                                    data-target="#themmoi">Thêm Mới</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped table-bordered table-hover table-danh-muc"
                        id="dataTables-example ">
                        <thead>
                            <tr>
                                <th id="btn1">STT</th>
                                <th>ID danh mục</th>
                                <th>Tên danh mục</th>
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
                                        <?php if($item->trang_thai == 1): ?>
                                                <?php echo e($item->trang_thai = 'Enable'); ?>

                                        <?php else: ?>
                                                <?php echo e($item->trang_thai = 'Disable'); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td class="center">
                                     <form id="form<?php echo e($item->id); ?>" action="<?php echo e(url('admin/danh-muc/delete/'.$item->id)); ?>" method="post">
                                        <a class="btn btn-primary btn-circle" title="Tất cả truyện" >
                                            <i class="fa fa-list-ul"></i>
                                        </a> 
                                    <a data-toggle="modal" id="<?php echo e($item->id); ?>" data-target="#sua" class="btn btn-success btn-circle btn-sua" title="Chỉnh sửa danh mục">
                                            <i class="fa  fa-edit"></i>
                                        </a> <a id="<?php echo e($item->id); ?>" class="btn btn-danger btn-circle btn-xoa" title="Xóa danh mục" >
                                            <i class="fa fa-close"></i></a>
                                    </td>
                                    </form>
                                   
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                    
                        </tbody>
                    </table>
                    <?php echo e($data->links()); ?>

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
                    <h4>Thêm danh mục mới</h4>
                </div>
                <div class="panel-body">
                    <h4>Nhập thông tin về danh mục </h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="<?php echo e(url('admin/danh-muc/insert')); ?>"method="post">
                                <div class="form-group">
                                    <label>Tên danh mục </label> <input class="form-control"
                                name="ten_danh_muc" id="ten_danh_muc" placeholder="Nhập tên danh mục truyện">
                                </div>
                                <div class="form-group">
                                    <label>Giới thiệu</label> 
                                    <textarea name="gioi_thieu" id="gioiThieu" rows="8" cols="60"></textarea>
                                    <script>CKEDITOR.replace('gioiThieu');</script>
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
                    <h4>Sửa danh mục</h4>
                </div>
                <div class="panel-body">
                    <h4>Nhập thông tin về danh mục </h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <form
                                 action="<?php echo e(url('admin/danh-muc/edit')); ?>"
                                method="post">
                               
                                <div class="form-group">
                                    <label>ID danh mục</label> <input class="form-control"
                                    id="id" name="id" value="" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tên danh mục</label> <input class="form-control"
                                    name="ten_danh_muc"  id="ten_danh_muc" placeholder="Nhập tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label>Giới thiệu</label>  <textarea name="gioi_thieu" id="gioiThieu2" rows="8" cols="60"></textarea>
                                    <script>CKEDITOR.replace('gioiThieu2');</script>
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <div class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="trang_thai" id="trangThai1" value="1" checked=""> Enable
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="trang_thai" id="trangThai0" value="0"> Disable
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $(document).ready(function(){
    // Sự kiện get dữ liệu khi click button sửa
     $(document).on('click','a.btn-sua',function(){
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
                       $("#sua #ten_danh_muc").val(item['ten_danh_muc']);
                       CKEDITOR.instances.gioiThieu2.setData(item['gioi_thieu']);
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
      // Sự kiện xóa dữ liệu
     $(document).on('click','a.btn-xoa',function(e){
        let id = $(this).attr('id');
        $.confirm({
        title: 'Cảnh báo!',
        content: 'Xác nhận xóa danh mục này?',
        buttons: {
                    confirm: {
                    text: 'Xác nhận',
                    btnClass: 'btn-blue',
                    keys: ['enter'],
                    action: function(){
                        $('#form'+id).submit();
                    }
                    },
                    cancel: {
                        text: 'Trở lại',
                        keys: ['esc'],
                        action: function(){}
                    }
                    }
                });
            });   
        });                    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\HocTap\xampp\htdocs\NhomTruyenLaravel\resources\views/admin/ql_danh_muc.blade.php ENDPATH**/ ?>