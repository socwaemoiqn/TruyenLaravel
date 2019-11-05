@if (session('mess'))
  <script>alert("{{ session('mess') }}");</script>
  {{Session::flush()}}
@endif 
<div id="container-logup">
        <i class="fas fa-times-circle fa-lg"></i>
<form action="{{url('logup')}}" method="post" autocomplete="off">
            <h1 id="abac">Đăng ký</h1>
            <div class="txtb">
                <input type="text" name="username">
                <span data-placeholder="Tài khoản" ></span>
            </div>
            <div class="txtb">
                <input type="password" name="password">
                <span data-placeholder="Mật khẩu" ></span>
            </div>
            <div class="txtb">
                <input type="password" name="repassword">
                <span data-placeholder="Xác nhận mật khẩu" ></span>
            </div>
            <div class="txtb">
                <input type="text" name="email">
                <span data-placeholder="Email" ></span>
            </div>
            <input type="submit" value="Đăng ký">
            <div class="bottom-text">
               Đã có tài khoản? <a HREF="#" id="btn-login">Quay lại</a>
            </div>
     </form>
</div>
<div class="cover-login"></div>