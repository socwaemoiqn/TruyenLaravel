<?php $__env->startSection('main'); ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý Tác Giả</h1>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if(session('mess')): ?>
             <div class="alert alert-success">
                <ul>
                        <li><?php echo e(session('mess')['status']); ?></li>
                        <li><?php echo e(session('mess')['name']); ?></li>
                </ul>
            </div>
        <?php endif; ?>
        <?php if(session('search')): ?>
        <div class="alert alert-info">
           <ul>
                   <li><?php echo e(session('search')['status']); ?></li>
                   <li><?php echo e(session('search')['count']); ?></li>
           </ul>
       </div>
       <?php echo e(Session::forget('search')); ?>

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
                            <form action="<?php echo e(url('admin/tac-gia/search')); ?>" method="get">
                                <td><input class="form-control" type="text"
                                placeholder="Nhập nội dung tìm kiếm" name="key"<?php if(isset($key)): ?> value="<?php echo e($key); ?>"<?php endif; ?>></td>
                                <td><input class="btn btn-primary" type="submit"
                                value="Tìm kiếm"> <a href="<?php echo e(url('admin/tac-gia')); ?>" class="btn btn-default">Trở lại</a>
                                </td>
                                </form>
                                <td>
                                </td>
                                <td><a
                                    href=""
                                    class="btn btn-primary" data-toggle="modal"
                                    data-target="#themmoi">Thêm Mới</a>
                                </td>
                              
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped table-bordered table-hover table-danh-muc"
                        id="dataTables-example ">
                        <thead>
                            <tr>
                                <th id="btn1">STT</th>
                                <th>ID tác giả</th>
                                <th>Tên tác giả</th>
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
                                    <td><?php echo e($item->ten_tac_gia); ?></td>
                                    <td class="center">4</td>
                                    <td class="center">
                                        <?php if($item->trang_thai == 1): ?>
                                                <?php echo e($item->trang_thai = 'Enable'); ?>

                                        <?php else: ?>
                                                <?php echo e($item->trang_thai = 'Disable'); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td class="center">
                                     <form id="form<?php echo e($item->id); ?>" action="<?php echo e(url('admin/tac-gia/delete/'.$item->id)); ?>" method="post">
                                        <a class="btn btn-primary btn-circle" title="Tất cả truyện" >
                                            <i class="fa fa-list-ul"></i>
                                        </a> 
                                    <a data-toggle="modal" id="<?php echo e($item->id); ?>" data-target="#sua" class="btn btn-success btn-circle btn-sua" title="Chỉnh sửa tác giả">
                                            <i class="fa  fa-edit"></i>
                                        </a> <a id="<?php echo e($item->id); ?>" class="btn btn-danger btn-circle btn-xoa" title="Xóa tác giả" >
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
                    <h4>Thêm tác giả mới</h4>
                </div>
                <div class="panel-body">
                    <h4>Nhập thông tin về tác giả </h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="<?php echo e(url('admin/tac-gia/insert')); ?>"method="post">
                                <div class="form-group">
                                    <label>Tên tác giả </label> <input class="form-control"
                                name="ten_tac_gia" id="ten_tac_gia" placeholder="Nhập tên tác giả truyện">
                                </div>
                                <div class="form-group">
                                    <label>Giới thiệu</label> 
                                    <textarea name="gioi_thieu" id="gioiThieu" rows="8" cols="60"></textarea>
                                    <script>CKEDITOR.replace('gioiThieu');</script>
                                </div>
                                <button type="submit" class="btn btn-primary">Thêm
                                    tác giả</button>
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
                    <h4>Sửa tác giả</h4>
                </div>
                <div class="panel-body">
                    <h4>Nhập thông tin về tác giả </h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <form
                                 action="<?php echo e(url('admin/tac-gia/edit')); ?>"
                                method="post">
                               
                                <div class="form-group">
                                    <label>ID tác giả</label> <input class="form-control"
                                    id="id" name="id" value="" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tên tác giả</label> <input class="form-control"
                                    name="ten_tac_gia"  id="ten_tac_gia" placeholder="Nhập tên tác giả">
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
                                    tác giả</button>
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
    window.onload = function() {
    
        $("input[name=key]").focus();
    };
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
              url: "admin/tac-gia/ajax",
              cache: false,
              type: "Post",
              dataType: "json",
              data: {
                  id: id
              },
              success: function(data)
              {
                        $("#sua #id").val(data.id);
                       $("#sua #ten_tac_gia").val(data.ten_tac_gia);
                       CKEDITOR.instances.gioiThieu2.setData(data.gioi_thieu);
                       if(data.trang_thai == 1)
                       {
                         $("#trangThai1").prop("checked",true);
                       }
                       else
                         $("#trangThai0").prop("checked",true);
              
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
        content: 'Xác nhận xóa tác giả này?',
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

<?php echo $__env->make('layout.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\HocTap\xampp\htdocs\NhomTruyenLaravel\resources\views/admin/ql_tac_gia.blade.php ENDPATH**/ ?>