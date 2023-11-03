<div id="form-auth">
    <form action="?action=register" method="POST" onsubmit="return validateRegister();">
        <h1>Register</h1>
        <label for="username">User Name</label>
        <input name="username" type="text" id="username" placeholder="Enter Username">
        <label for="email">Email</label>
        <input name="email" type="email" id="email" placeholder="Enter Email">
        <label for="password">Password</label>
        <input name="password" type="password" id="password" placeholder="Enter Password">
        <label for="confirmpassword">Confirm Password</label>
        <input name="confirmpassword" type="password" id="confirmpassword" placeholder="Confirm Password">
        <div id="error-confirm"></div>
        <button name="register">Register</button>
        <div class="more-form">
            <span>Already a member?</span>
            <a href="?auth=login">Login</a>
        </div>
    </form>
</div>
<!-- Xử lí hiển thị -->
<?= (isset($result) && $result === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Success',text: 'Check your mailbox to activate your account',});</script>" : ""?>
<?= (isset($result) && $result === "Tài khoản đã được đăng ký") ? "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Account has been registered!',});</script>" : "" ?>
<?= (isset($result) && $result === "Kích hoạt tài khoản thành công") ? "<script>Swal.fire({icon: 'success',title: 'Success',text: 'Account activation successful',}).then((result) => { if (result.isConfirmed) {window.location.href = '?auth=login';}});</script>" : "" ?>
<?= (isset($result) && $result === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->