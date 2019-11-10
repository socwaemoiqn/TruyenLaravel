@extends('layout.admin.master')
@if (session('mess'))
  <script>alert("{{ session('mess') }}");</script>
  {{Session::flush()}}
  @endif 
@section('main')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý thành viên nhóm dịch</h1>
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
                            <form action="{{url('admin/danh-muc/search')}}" method="get">
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
                                <th>Tên Nhóm Dịch</th>
                                <th>Tên Tài Khoản</th>
                                <th>Vai Trò</th>
                                <th>Trạng Thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="odd gradeX">
                                <td scope="row">{{$loop->index+1}}</td>
                                    <td>{{$item->ten_nhom_dich}}</td>
                                    <td>{{$item->ten_tai_khoan}}</td>
                                    <td>{{$item->ten_vai_tro}}</td>
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
                                    <a data-toggle="modal" id="{{$item->id}}" data-target="#sua" class="btn btn-success btn-circle btn-sua" title="Chỉnh sửa danh mục"
                                        >
                                            <i class="fa  fa-edit"></i>
                                        </a>
                                        <a id="{{$item->id}}" class="btn btn-danger btn-circle btn-xoa" title="Xóa danh mục">
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
                    <h4>Thêm danh mục truyện mới</h4>
                </div>
                <div class="panel-body">
                    <h4>Nhập thông tin về danh mục truyện</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <form
                        action="{{url('admin/danh-muc/insert')}}"
                                method="post">
                               {{  csrf_field()  }}
                                <div class="form-group">
                                    <label>Tên danh mục truyện</label> <input class="form-control"
 name="tenDanhMuc" placeholder="Nhập tên danh mục truyện">
                                </div>
                                <div class="form-group">
                                    <label>Giới thiệu</label> 
                                    <textarea name="gioiThieu" id="gioiThieu" rows="8" cols="60"></textarea>
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
                       $("#sua #tenDanhMuc").val(item['ten_danh_muc']);
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
     // Sự kiện get dữ liệu khi click button sửa
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
                  gioiThieu: CKEDITOR.instances.gioiThieu2.setData(),
                  trangThai: trangThai
              },
              success: function(data)
              {
                  $("body").load("admin/danh-muc/");
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
          if(!confirm('Xác nhận xóa danh mục này?')) return false;
          $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
              url: "admin/danh-muc/ajax/delete",
              cache: false,
              type: "Post",
              dataType: "text",
              data: {
                  id: id
              },
              success: function(data)
              {
                    $("body").load("admin/danh-muc/");
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
@endsection
