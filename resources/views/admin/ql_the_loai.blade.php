@extends('layout.admin.master')
@if (session('mess'))
    <script>alert("{{ session('mess') }}");</script>
    {{Session::flush()}}
@endif 
@section('main')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý thể loại</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
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
                            <form action="{{url('admin/the-loai/search')}}" method="get">
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
                                <th>ID thể loại</th>
                                <th>Tên thể loại</th>
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
                                    <td>{{$item->ten_the_loai}}</td>
                                    <td class="center">4</td>
                                    <td class="center">
                                        @if ($item->trang_thai == 1)
                                                {{$item->trang_thai = 'Enable'}}
                                        @else
                                                {{$item->trang_thai = 'Disable'}}
                                        @endif
                                    </td>
                                    <td class="center">
                                     <form id="form{{$item->id}}" action="{{url('admin/the-loai/delete/'.$item->id)}}" method="post">
                                        <a class="btn btn-primary btn-circle" title="Tất cả truyện" >
                                            <i class="fa fa-list-ul"></i>
                                        </a> 
                                    <a data-toggle="modal" id="{{$item->id}}" data-target="#sua" class="btn btn-success btn-circle btn-sua" title="Chỉnh sửa thể loại">
                                            <i class="fa  fa-edit"></i>
                                        </a> <a id="{{$item->id}}" class="btn btn-danger btn-circle btn-xoa" title="Xóa thể loại" >
                                            <i class="fa fa-close"></i></a>
                                    </td>
                                    </form>
                                   
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
                    <h4>Thêm thể loại mới</h4>
                </div>
                <div class="panel-body">
                    <h4>Nhập thông tin về thể loại </h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{url('admin/the-loai/insert')}}"method="post">
                                <div class="form-group">
                                    <label>Tên thể loại </label> <input class="form-control"
                                name="ten_the_loai" id="ten_the_loai" placeholder="Nhập tên thể loại truyện">
                                </div>
                                <div class="form-group">
                                    <label>Giới thiệu</label> 
                                    <textarea name="gioi_thieu" id="gioiThieu" rows="8" cols="60"></textarea>
                                    <script>CKEDITOR.replace('gioiThieu');</script>
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
<div class="modal fade" id="sua" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="col-lg-12">
            <div class="panel panel-green">

                <div class="panel-heading">
                    <h4>Sửa thể loại</h4>
                </div>
                <div class="panel-body">
                    <h4>Nhập thông tin về thể loại </h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <form
                                 action="{{url('admin/the-loai/edit')}}"
                                method="post">
                               
                                <div class="form-group">
                                    <label>ID thể loại</label> <input class="form-control"
                                    id="id" name="id" value="" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tên thể loại</label> <input class="form-control"
                                    name="ten_the_loai"  id="ten_the_loai" placeholder="Nhập tên thể loại">
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
              url: "admin/the-loai/ajax",
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
                       $("#sua #ten_the_loai").val(item['ten_the_loai']);
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
        content: 'Xác nhận xóa thể loại này?',
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
@endsection
