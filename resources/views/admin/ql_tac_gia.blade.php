@extends('layout.admin.master')
@if (session('mess'))
  <script>alert("{{ session('mess') }}");</script>
  {{Session::flush()}}

  @endif 
  @isset($mess)
  @foreach ($mess as $item)
  {{$item}}
@endforeach
  @endisset
@section('main')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý Tác Giả</h1>
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
                            <form action="{{url('admin/tac-gia/search')}}" method="get">
                                <td><input class="form-control" type="text"
                                    placeholder="Nhập nội dung tìm kiếm" name="key"></td>
                                <td><input class="btn btn-default" type="submit"
                                    value="Tìm kiếm"></td>
                                </form>
                                <td><a
                                    href="${pageContext.request.contextPath}/quan-tri/ql_TacGia_truyen/them"
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
                                <th>ID tác giả</th>
                                <th>Tên tác giả</th>
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
                                    <td>{{$item->ten_tac_gia}}</td>
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
                                    <a data-toggle="modal" id="{{$item->id}}" data-target="#sua" class="btn btn-success btn-circle btn-sua" title="Chỉnh sửa tác giả">
                                            <i class="fa  fa-edit"></i>
                                        </a>
                                        <a id="{{$item->id}}" class="btn btn-danger btn-circle btn-xoa" title="Xóa tác giả">
                                            <i class="fa fa-close"></i></a></td>
                                </tr>
                            @endforeach
                           
                    
                        </tbody>
                    </table>
                    {{ $data->links() }}
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
                            <form action="{{url('admin/tac-gia/insert')}}"method="post">
                                <div class="form-group">
                                    <label>Tên tác giả </label> <input class="form-control"
                                name="tenTacGia" id="tenTacGia" placeholder="Nhập tên tác giả truyện">
                                </div>
                                <div class="form-group">
                                    <label>Giới thiệu</label> 
                                    <textarea name="gioiThieu" id="gioiThieu" rows="8" cols="60"></textarea>
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
                                action=""
                                method="post">
                               
                                <div class="form-group">
                                    <label>ID tác giả</label> <input class="form-control"
                                    id="id" name="id" value="" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tên tác giả</label> <input class="form-control"
                                    id="tenTacGia" name="tenTacGia" placeholder="Nhập tên tác giả">
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

@endsection
@section('js')
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
              url: "admin/tac-gia/ajax",
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
                       $("#sua #tenTacGia").val(item['ten_tac_gia']);
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
     // Sự kiện submit sửa dữ liệu
     $("#sua button[type=submit]").click(function(e){
        e.preventDefault();
        var trangThai = $("#sua #trangThai1").prop("checked") ? 1 : 0;
        $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
              url: "admin/tac-gia/ajax/edit",
              cache: false,
              type: "Post",
              dataType: "text",
              data: {
                  id: $("#sua #id").val(),
                  tenTacGia: $("#sua #tenTacGia").val(),
                  gioiThieu: CKEDITOR.instances.gioiThieu2.setData(),
                  trangThai: trangThai
              },
              success: function(data)
              {
                 ajaxGetData();
                alert(data);
              }
           });
     });
      // Sự kiện xóa dữ liệu
     $(document).on('click','a.btn-xoa',function(){
          let id =  $(this).attr('id');
          $.confirm({
            title: 'Cảnh báo!',
            content: 'Xác nhận xóa tác giả này?',
            buttons: {
                confirm: {
                text: "Xác nhận",
                btnClass: 'btn-blue',
                keys: ['enter'],
                action :function () {
                 $.ajax({
                 url: "admin/tac-gia/ajax/delete",
                 cache: false,
                type: "Post",
                 dataType: "text",
                 data: {
                  id: id
                },
                success: function(data)
                {
                    alert(data);
                    ajaxGetData();
                   
                }    
                });
                 }
                },
                 cancel: function () {
                 }
                 }
                });       
     });   
   });
   // ajax Load dữ liệu 
   function ajaxGetData()
   {
       let html = "";
       let i = 0;
        $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
       $.ajax({
          url: "admin/tac-gia/ajax/get",
          cache: false,
                type: "Post",
                 dataType: "text",
                 data: {
                },
                success: function(data)
                {
                    $.each(data,function(key,item)
                    {
                       html += '<tr class="odd gradeX">';
                        html +='<td scope="row">'+(i+1)+'</td>';
                            html +='<td>'+item[0]+'</td>';
                                html +=' <td>'+item.data['ten_tac_gia']+'</td>';
                                    html +='   <td class="center">4</td>';
                                        html += ' <td class="center">'+item.data['trang_thai']+' </td>';
                                         html += ' <td class="center"> <a class="btn btn-primary btn-circle" title="Tất cả truyện" ><i class="fa fa-list-ul"></i></a>';
                                             html += '<a data-toggle="modal" id="'+item.data['id']+'" data-target="#sua" class="btn btn-success btn-circle btn-sua" title="Chỉnh sửa tác giả"><i class="fa  fa-edit"></i></a>';
                                                 html += '<a id="'+item.data['id']+'" class="btn btn-danger btn-circle btn-xoa" title="Xóa tác giả"><i class="fa fa-close"></i></a></td></tr>';
                     i += 1;          
                   });
                   $(".table-danh-muc tbody").html(html);
                }    
       });
      
   }
   
                      
</script>
@endsection
