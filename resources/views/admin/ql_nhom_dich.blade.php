@extends('layout.admin.master')
@if (session('mess'))
  <script>alert("{{ session('mess') }}");</script>
  {{Session::flush()}}
  @endif 
@section('main')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý Nhóm Dịch</h1>
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
                            <form action="{{url('admin/nhom-dich/search')}}" method="get">
                                <td><input class="form-control" type="text"
                                    placeholder="Nhập nội dung tìm kiếm" name="key"></td>
                                <td><input class="btn btn-default" type="submit"
                                    value="Tìm kiếm"></td>
                                </form>
                                <td><a
                                    href="${pageContext.request.contextPath}/quan-tri/ql_NhomDich_truyen/them"
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
                                <th>ID nhóm dịch</th>
                                <th>Tên nhóm dịch</th>
                                <th>Nhóm trưởng</th>
                                <th>Số lượng Truyện</th>
                                <th>Trạng Thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="odd gradeX">
                                <td scope="row">{{$loop->index+1}}</td>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->ten_nhom_dich}}</td>
                                    <td>socwaemoiqn</td>
                                    <td class="center">4</td>
                                    <td class="center">
                                        @if ($item->trang_thai == 1)
                                                {{$item->trang_thai = 'Enable'}}
                                        @else
                                                {{$item->trang_thai = 'Disable'}}
                                        @endif
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-primary btn-circle" title="Tất cả truyện" >
                                            <i class="fa fa-list-ul"></i>
                                        </a> 
                                    <a data-toggle="modal" id="{{$item->id}}" data-target="#sua" class="btn btn-success btn-circle btn-sua" title="Chỉnh sửa nhóm dịch">
                                            <i class="fa  fa-edit"></i>
                                        </a>
                                        <a id="{{$item->id}}" class="btn btn-danger btn-circle btn-xoa" title="Xóa nhóm dịch">
                                            <i class="fa fa-close"></i></a></td>
                                </tr>
                            @endforeach
                           
        
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
                    <h4>Thêm nhóm dịch mới</h4>
                </div>
                <div class="panel-body">
                    <h4>Nhập thông tin về nhóm dịch </h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <form
                        action="{{url('admin/nhom-dich/insert')}}"
                                method="post">
                               {{  csrf_field()  }}
                                <div class="form-group">
                                    <label>Tên nhóm dịch </label> <input class="form-control"
 name="tenNhomDich" placeholder="Nhập tên nhóm dịch truyện">
                                </div>
                                <div class="form-group">
                                        <label>Tên tài khoản nhóm trưởng </label> <input class="form-control"
     name="tenTaiKhoan" placeholder="Nhập tên tài khoản của nhóm trưởng">
                                    </div>
                                <div class="form-group">
                                    <label>Giới thiệu</label> 
                                    <textarea name="gioiThieu" id="gioiThieu" rows="8" cols="60"></textarea>
                                    <script>CKEDITOR.replace('gioiThieu');</script>
                                </div>
                                <button type="submit" class="btn btn-primary">Thêm
                                    nhóm dịch</button>
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
                    <h4>Sửa nhóm dịch</h4>
                </div>
                <div class="panel-body">
                    <h4>Nhập thông tin về nhóm dịch </h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <form
                                action=""
                                method="post">
                               
                                <div class="form-group">
                                    <label>ID nhóm dịch</label> <input class="form-control"
                                    id="id" name="id" value="" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tên nhóm dịch</label> <input class="form-control"
                                    id="tenNhomDich" name="tenNhomDich" placeholder="Nhập tên nhóm dịch">
                                </div>
                                <div class="form-group">
                                        <label>Tên tài khoản nhóm trưởng </label> <input class="form-control"
     name="tenTaiKhoan" id="tenTaiKhoan" placeholder="Nhập tên tài khoản của nhóm trưởng">
                                    </div>
                                <div class="form-group">
                                    <label>Giới thiệu</label>  <textarea name="gioiThieu" id="gioiThieu2" rows="8" cols="60"></textarea>
                                    <script>CKEDITOR.replace('gioiThieu2');</script>
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
                                    nhóm dịch</button>
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
        $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
     $(document).on('click','a.btn-sua',function(){
          let id =  $(this).attr('id');
         
           $.ajax({
              url: "admin/nhom-dich/ajax",
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
                       $("#sua #tenNhomDich").val(item['ten_nhom_dich']);
                       CKEDITOR.instances.gioiThieu2.setData(item['gioi_thieu']);
                       $("#sua #tenTaiKhoan").val(item['tai_khoan_id']);
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
     // Sự kiện get dữ liệu khi click button sửa
     $("#sua button[type=submit]").click(function(e){
        e.preventDefault();
        var trangThai = $("#sua #trangThai1").prop("checked") ? 1 : 0;
           $.ajax({
              url: "admin/nhom-dich/ajax/edit",
              cache: false,
              type: "Post",
              dataType: "text",
              data: {
                  id: $("#sua #id").val(),
                  tenNhomDich: $("#sua #tenNhomDich").val(),
                  gioiThieu: CKEDITOR.instances.gioiThieu2.setData(),
                  trangThai: trangThai
              },
              success: function(data)
              {
                  $("body").load("admin/nhom-dich/");
                alert(data);
              },
              error: function(error)
              {
                alert(error);
              } 
           });
     });
     // Sự kiện submit sửa dữ liệu
     $(document).on('click','a.btn-xoa',function(){
          let id =  $(this).attr('id');
          $.confirm({
            title: 'Cảnh báo!',
            content: 'Xác nhận xóa nhóm dịch này?',
            buttons: {
                confirm: {
                text: "Xác nhận",
                btnClass: 'btn-blue',
                keys: ['enter'],
                action :function () {
                 $.ajax({
                 url: "admin/nhom-dich/ajax/delete",
                 cache: false,
                type: "Post",
                 dataType: "text",
                 data: {
                  id: id
                },
                success: function(data)
                {
                    $("body").load("admin/nhom-dich/");
                }    
                });
                 }
                },
                 cancel: function () {
                 }
                 }
                });       
     });
     // Sự kiện xóa dữ liệu
   });
</script>
@endsection
