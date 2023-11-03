<div id="form-auth">
    <form action="" method="POST" onsubmit="return validateNewPassword()">
        <h1>New Password</h1>
        <label for="password">Password</label>
        <input name="password" type="password" id="password" placeholder="Enter Password">
        <label for="confirmpassword">Confirm Password</label>
        <input name="confirmpassword" type="password" id="confirmpassword" placeholder="Confirm Password">
        <div id="error-confirm"></div>
        <button name="submit">Submit</button>
    </form>
</div>
<!-- Xử lí hiển thị -->
<?= (isset($result) && $result === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Success',text: 'New password activated successfully',}).then((result) => { if (result.isConfirmed) {window.location.href = '?auth=login';}});</script>" : ""?>
<?= (isset($result) && $result === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Error!',});</script>" : "" ?>
<?= (isset($result) && $result === "Chưa nhập đủ thông tin") ? "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Not enough information has been entered!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->