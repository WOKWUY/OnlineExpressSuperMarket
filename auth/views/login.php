<div id="form-auth">
    <form action="?action=login" method="POST" onsubmit="return validateLogin()">
        <h1>Login</h1>
        <label for="email">Email</label>
        <input name="email" type="email" id="email" placeholder="Enter Email">
        <label for="password">Password</label>
        <input name="password" type="password" id="password" placeholder="Enter Password">
        <button name="login">Continute</button>
        <div class="more-form">
            <span>Not a member?</span>
            <a href="?auth=register">Register</a>
        </div>
        <div class="more-form">
            <a href="?auth=forgot-password" class="forgotpassword">Forgot Password?</a>
        </div>
        <!-- Có thể thêm các cách đăng nhập khác như Facebook, Google ...(bằng các ô input) -->
    </form>
</div>
<!-- Xử lí hiển thị -->
<?= (isset($result) && $result === "Tài khoản của bạn chưa được kích hoạt") ? "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Your account has not been activated!',});</script>" : "" ?>
<?= (isset($result) && $result === "Tài khoản của bạn đã bị vô hiệu hóa") ? "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Your account has been disabled!',});</script>" : ""?>
<?= (isset($result) && $result === "Tài khoản chưa được đăng ký") ? "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Account is not registered!',});</script>" : ""?>
<?= (isset($result) && $result === "Tài khoản của bạn bị lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Your account is in error!',});</script>" : "" ?>
<?= (isset($result) && $result === "Mật khẩu sai") ? "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Wrong password!',});</script>" : "" ?>
<?= (isset($result) && $result === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->