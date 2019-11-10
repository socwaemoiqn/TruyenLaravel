@extends('layout.admin.master')
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
            <div class="panel-heading">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('mess'))
                 <div class="alert alert-success">
                    <ul>
                            <li>{{ session('mess')['status'] }}</li>
                            <li>{{ session('mess')['name'] }}</li>
                    </ul>
                </div>
            @endif
            @if (session('search'))
            <div class="alert alert-info">
               <ul>
                       <li>{{ session('search')['status'] }}</li>
                       <li>{{ session('search')['count'] }}</li>
               </ul>
           </div>
           {{Session::forget('search')}}
             @endif
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                        
                    <table class="table table-striped table-bordered table-hover" border="0">
                        <tbody>
                            <tr>
                            <form action="{{url('admin/tac-gia/search')}}" method="get">
                                <td> <a href="{{url('admin/tac-gia')}}" class="btn btn-warning" title="Trở lại">
                                    <i class="fa  fa-arrow-left fa-1x"></i></a></td>
                                <td><input class="form-control" type="text"
                                placeholder="Nhập nội dung tìm kiếm" name="key"@isset($key) value="{{$key}}"@endisset></td>
                                <td><input class="btn btn-primary" type="submit"
                                value="Tìm kiếm">
                                </td>
                                </form>
                                <td><a
                                    href=""
                                    class="btn btn-primary" data-toggle="modal"
                                    data-target="#themmoi">Thêm Mới</a>
                                </td>
                                <td><label
                                    class="btn btn-primary" id="btn-all">Chọn tất cả </label>
                                {{-- <a
                                    class="btn btn-success" id="btn-enable" disabled>Kích hoạt</a>
                                    <a
                                    class="btn btn-warning" id="btn-disable" disabled>Vô hiệu</a>
                                    <a
                                    class="btn btn-danger"  id="btn-delete" disabled>Xóa</a> --}}
                                  
                                </td>
                                <td>  
                                <form action="{{url('admin/tac-gia/select-all')}}" method="Post">
                                        <input type="hidden" name="array_id" value="">
                                        <select id="select-all" class="form-control" disabled>
                                            <option value="">Tùy chọn</option>
                                            <option value="enable">Kích hoạt</option>
                                            <option value="disable">Vô hiệu</option>
                                            <option value="delete">Xoá</option>
                                        </select>
                                </form>
                                    
                            </td>
                                <td><label
                                    class="btn btn-danger" disabled >Hiện có: {{$data->total()}} tác giả </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                  
                    <table class="table table-striped table-bordered table-hover table-danh-muc"
                        id="dataTables-example ">
                        <thead>
                            <tr>
                                    <th class="text-center">Chọn</th>
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
                                <td class="text-center"><input type="checkbox" name="" id="{{$item->id}}"></td>
                                <td scope="row">{{$loop->index+1}}</td>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->ten_tac_gia}}</td>
                                    <td class="center">4</td>
                                    <td class="center">
                                        @if ($item->trang_thai == 1)
                                                {{$item->trang_thai = 'Kích hoạt'}}
                                        @else
                                                {{$item->trang_thai = 'Vô hiệu'}}
                                        @endif
                                    </td>
                                    <td class="center">
                                     <form id="form{{$item->id}}" action="{{url('admin/tac-gia/delete/'.$item->id)}}" method="post">
                                        <a class="btn btn-primary btn-circle" title="Tất cả truyện" >
                                            <i class="fa fa-list-ul"></i>
                                        </a> 
                                    <a data-toggle="modal" id="{{$item->id}}" data-target="#sua" class="btn btn-success btn-circle btn-sua" title="Chỉnh sửa tác giả">
                                            <i class="fa  fa-edit"></i></a>
                                         <a id="{{$item->id}}" class="btn btn-danger btn-circle btn-xoa" title="Xóa tác giả" >
                                            <i class="fa fa-close"></i></a>     
                                    </td>
                                    </form>
                                   
                                </tr>
                            @endforeach
                           
                    
                        </tbody>
                    </table>
                   
                </div>
                <div class="col text-center">{{ $data->links() }} </div>  
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
            <div class="panel panel-green ">

                <div class="panel-heading">
                    <h4>Sửa tác giả</h4>
                </div>
                <div class="panel-body">
                    <h4>Nhập thông tin về tác giả </h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <form
                                 action="{{url('admin/tac-gia/edit')}}"
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
@endsection
@section('js')
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
        $(document).on('click','a.btn-xoa',function(){
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
                            action: function(){
                            }
                        }
                        }
                    });
        });  
        // Var checkbox
        var array_checkbox = $("input[type=checkbox]"); // Mảng các control checkbox
        var array_value_checkbox = new Array(); // Mảng các id của tác giả
        var array_button = ['select-all']; // Mảng các control button
        // Xử lí sự kiện khi click vào 1 checkbox
        $(document).on('click','input[type=checkbox]',function(){
            let id = $(this).attr('id');   // Lấy id của tac giả được  check
            if(ClickCheckbox(this,array_checkbox,array_value_checkbox,array_button)) // Nếu checkbox được check
            {
                array_value_checkbox.push(id); // Thêm id của tác giả vào arrray
                
            }
            else
            {
                var index_checkbox_unchecked = array_value_checkbox.indexOf(id); // Tìm index của id tác giả trong array
                array_value_checkbox.splice(index_checkbox_unchecked,1); // Xóa id của tác giả trong arrray theo index
            } 

        });
        // Xử lí sự kiên khi click vào Button Chọn tất cả 
        $("#btn-all").click(()=>{
            CheckAll(array_checkbox,array_value_checkbox,array_button); // Check all checkbox
           
        });

        // Xử lí sự kiện khi chọn 1 action trong select box
        $("#select-all").change(()=>{
            let value = $('#select-all').val();
            $.confirm({
            title: 'Thông báo!',
            content: 'Bạn chắc chắn thực hiện thao tác này?',
            buttons: {
                        confirm: {
                        text: 'Xác nhận',
                        btnClass: 'btn-blue',
                        keys: ['enter'],
                        action: function(){
                            if(value == "delete")
                            {
                                $.confirm({
                                title: 'Cảnh báo!',
                                content: 'Đây là hành động xóa dữ liệu. Dữ liệu sẽ mất vĩnh viễn. Bạn chắc chắn muốn xóa?',
                                buttons: {
                                            confirm: {
                                            text: 'Xác nhận',
                                            btnClass: 'btn-red',
                                            keys: ['enter'],
                                            action: function(){
                                                let url = $("#select-all").parent().attr('action')+"/"+value;
                                                var json = JSON.stringify(array_value_checkbox);
                                                $("input[name=array_id]").val(json);
                                                $("#select-all").parent().attr("action",url);
                                                $("#select-all").parent().submit();
                                            }
                                            },
                                            cancel: {
                                                text: 'Trở lại',
                                                keys: ['esc'],
                                                action: function(){
                                                    
                                                }
                                            }
                                            }
                                        });
                            }
                            else
                            {
                                let url = $("#select-all").parent().attr('action')+"/"+value;
                                var json = JSON.stringify(array_value_checkbox);
                                $("input[name=array_id]").val(json);
                                $("#select-all").parent().attr("action",url);
                                $("#select-all").parent().submit();
                            }
                           
                            
                        }
                        },
                        cancel: {
                            text: 'Trở lại',
                            keys: ['esc'],
                            action: function(){
                            }
                        }
                        }
                    });




            
            
        });

    });      
    ClickCheckbox = (e,array_checkbox,array_value_checkbox,array_button) =>{
        if(e.checked) // Nếu checkbox được checked
        {
            EnableButton(array_button); // Enable các button
            $("#btn-all").html('Hủy');// Đổi tên hiển thị của button
            return true; 
        }
        else // Nếu checkbox được unchecked
        {
            if(!CheckArrayChecked(array_checkbox)) // Kiểm tra xem nếu tất cả checkbox đã được uncheck
            {   
                DisableButton(array_button); // Disable các button
                $("#btn-all").html('Chọn tất cả');// Đổi tên hiển thị của button
            }
            return false;              
        }
    }
    CheckArrayChecked = (array_checkbox) => {
       for(let i = 0; i < array_checkbox.length; i++) // Duyệt mảng các control checkbox
       {
           if(array_checkbox[i].checked) return true; // Nếu có 1 checkbox được chọn thì trả về true
       }
        return false; // Nếu ko có checkbox nào ddc chọn hết thì về false   
    }    
    CheckAll = (array_checkbox,array_value_checkbox,array_button) => {
        if(array_value_checkbox.length > 0) // Nếu mảng khác rỗng, tức là đã chọn tất cả 
        {
            for(let i = 0; i < array_checkbox.length; i++) // Duyệt mảng các control checkbox
            {
                array_checkbox[i].checked = false; // Gán về false (Gỡ check)
                var index_checkbox_unchecked = array_value_checkbox.indexOf(array_checkbox[i].getAttribute("id")); // Tìm index của id tác giả trong array 
                array_value_checkbox.splice(index_checkbox_unchecked,1); // Xóa id của tác giả trong arrray theo index
                $("#btn-all").html('Chọn tất cả'); // Đổi tên hiển thị của button 
            }
            DisableButton(array_button);
        }
        else // Nếu mảng rỗng , tức là chưa chọn gì hết
        {
            for(let i = 0; i < array_checkbox.length; i++)// Duyệt mảng các control checkbox
            {
                array_value_checkbox.push(array_checkbox[i].getAttribute("id")); // Thêm id của tác giả vào arrray
                
                array_checkbox[i].checked = true;  // Gán về true (check)
            }
            EnableButton(array_button);
            $("#btn-all").html('Hủy');// Đổi tên hiển thị của button
        }
    }
    DisableButton = (array_button) => {
        for (let index = 0; index < array_button.length; index++) { // Duyệt mảng các button
            $("#"+array_button[index]).attr('disabled','true'); // Enable button
        }
    }
    EnableButton = (array_button) => {
        for (let index = 0; index < array_button.length; index++) { // Duyệt mảng các button
            $("#"+array_button[index]).removeAttr('disabled'); // Disable button
        }
    }   
    // Hàm dùng để in mảng lên console
    ShowArray = (array) => {
        for (let index = 0; index < array.length; index++) {
            console.log(array[index]);    
        }
    }
</script>
@endsection
