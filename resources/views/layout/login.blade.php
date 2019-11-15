@if (session('mess'))
  <script>alert("{{ session('mess') }}");</script>
  {{Session::flush()}}
  @endif  
  <div id="fb-root"></div>
<div id="container-login">
        <i class="fas fa-times-circle fa-lg"></i>
<form action="{{ url('login')}}" method="post" autocomplete="off">
            <h1 id="abac">Đăng nhập</h1>
            <div class="txtb">
                <input type="text" name="username" >
                <span data-placeholder="Tài khoản"></span>
            </div>
            <div class="txtb">
                <input type="password" name="password">
                <span data-placeholder="Mật khẩu"></span>
            </div>
            <input type="submit" name="btnLogin"value="Đăng nhập">
            <a href="redirect/facebook">Đăng nhập với facebook</a>
      
            <div class="bottom-text">
               Chưa có tài khoản? <a HREF="#" id="btn-logup">Đăng ký</a>
            </div>
     </form>
    </div>