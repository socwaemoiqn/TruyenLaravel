<?php if(session('mess')): ?>
  <script>alert("<?php echo e(session('mess')); ?>");</script>
  <?php echo e(Session::flush()); ?>

  <?php endif; ?>  
<div id="container-login">
        <i class="fas fa-times-circle fa-lg"></i>
<form action="<?php echo e(url('login')); ?>" method="post" autocomplete="off">
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
            <div class="bottom-text">
               Chưa có tài khoản? <a HREF="#" id="btn-logup">Đăng ký</a>
            </div>
     </form>
    </div><?php /**PATH D:\HocTap\xampp\htdocs\NhomTruyenLaravel\resources\views/layout/login.blade.php ENDPATH**/ ?>