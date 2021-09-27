<?php
    if(isset($_POST['dangnhap_home'])){
        $taikhoan = $_POST['email_login'];
        $matkhau = md5($_POST['password_login']);
        if($taikhoan==''||$matkhau==''){
            echo '<script>alert("Lam on khong de trong")</script>';
        }else{
            $sql_select_admin = mysqli_query($con,"SELECT * FROM tbl_khachhang WHERE email='$taikhoan' AND password='$matkhau' LIMIT 1");
            $count = mysqli_num_rows($sql_select_admin);
            $row_dangnhap = mysqli_fetch_array($sql_select_admin);
            if($count>0){
                $_SESSION['dangnhap_home'] = $row_dangnhap['name'];
                $_SESSION['khachhang_id'] = $row_dangnhap['khachhang_id'];
                Session :: set('login',true);
                header('Location: index.php?quanly=giohang');
            }else{
                echo '<script>alert("Tai khoan hoac mat khau sai")</script>';
            }
        }
    }elseif(isset($_POST['dangky'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $note = $_POST['note'];
        $address = $_POST['address'];
        $giaohang = $_POST['giaohang'];
        $sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(name,phone,email,address,note,giaohang,password) values
            ('$name','$phone','$email','$address','$note','$giaohang','$password')");
        $sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
        $row_khachhang = mysqli_fetch_array($sql_select_khachhang);
        $_SESSION['dangnhap_home'] = $name;
        $_SESSION['khachhang_id'] = $row_khachhang['khachhang_id'];
        header('Location: index.php?quanly=giohang');
    }
?>
<div class="login">
    <div class="center">
        <h1>Đăng nhập</h1>
        <form action="" method="post">
            <div class="txt_field">
                <input type="text" name="email_login">
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password_login">
                <span></span>
                <label>Mật khẩu</label>
            </div>
            <div class="pass">Forgot Password?</div>
            <input type="submit" name="dangnhap_home" value="Đăng nhập">
            <div class="signup_link">
                Chưa có tài khoản<a href="?quanly=signin">Đăng ký ngay</a>
            </div>
        </form>
    </div>
</div>