<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../config/format.php');
?>

<?php
class khadd
{
    private $fm;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function show_star(){
        $query = "SELECT * FROM tbl_rating ORDER BY rating_id DESC";
        $result = $this->db->select($query);
        return $result;
        
    }
    public function del_bl($id)
    {
        $squery = "DELETE FROM tbl_binhluan WHERE binhluan_id ='$id'" ;
        $result = $this ->db->delete($squery);
        if($result){
            $alert ="<span class ='thanhcong'>xoa thanh cong</span> ";
            return $alert;
        }
        else{
            $alert ="<span class ='thanhcong'>xoa that bai</span> ";
            return $alert;
        } 
    }
    public function insert_star(){
        $product_id = $_POST['product_id_binhluan'];
        $star = $_POST["rating"];
        if($star==''){
            $alert = "<span class='error'>Không để trống các trường</span>";
            return $alert;
        }else{
            $query = "INSERT INTO tbl_rating(rating,sanpham_id) VALUES('$star','$product_id')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Bình luận đã gửi</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Bình luận không thành công</span>";
                    return $alert;
            }
        }
    }
    public function insert_binhluan(){
        $product_id = $_POST['product_id_binhluan'];
        $tenbinhluan = $_POST['tennguoibinhluan'];
        $binhluan = $_POST['binhluan'];
        if($tenbinhluan=='' || $binhluan==''){
            $alert = "<span class='error'>Không để trống các trường</span>";
            return $alert;
        }else{
            $query = "INSERT INTO tbl_binhluan(ten_kh,binhluan,sanpham_id) VALUES('$tenbinhluan','$binhluan','$product_id')";
                $result = $this->db->insert($query);
 
        }
    }
    public function show_bl(){
        $query = " SELECT tbl_binhluan.*,tbl_khachhang.name FROM tbl_khachhang INNER JOIN tbl_binhluan ON tbl_binhluan.khachhang_id = tbl_khachhang.khachhang_id ORDER BY tbl_binhluan.binhluan_id DESC";
        $result = $this->db->select($query);
        return $result;
        
    }
    public function show_bladmin(){
        $query = "SELECT * FROM tbl_binhluan ORDER BY binhluan_id DESC";
        $result = $this->db->select($query);
        return $result;
        
    }
    public function insert_cus($cusname,$cusaddr,$cus_num,$cusemail)
    {
        $cusname= $this ->fm->validation($cusname);
        $cusaddr= $this ->fm->validation($cusaddr);
        $cusname = mysqli_real_escape_string($this->db->link,$cusname);
        $cusaddr = mysqli_real_escape_string($this->db->link,$cusaddr);
        $cus_num= $this ->fm->validation($cus_num);
        $cus_num= mysqli_real_escape_string($this->db->link, $cus_num);
        $cusemail= $this ->fm->validation($cusemail);
        $cusemail=mysqli_real_escape_string($this->db->link, $cusemail);

        if(empty($cusname)&&empty($cusaddr)&&empty($cus_num)&&empty($cusemail))
        {
            $alert = "<span class ='thanhcong'>Vui long dien ten khach hang</span>";
            return $alert;
        }
        else{
            $squery = "INSERT INTO tbl_khachhang(ten,address,phone,email) VALUES('$cusname','$cusaddr','$cus_num','$cusemail')";
            $result = $this ->db->insert($squery);
            if($result){
                $alert ="<span class ='thanhcong'>Them thanh cong</span> ";
                return $alert;
            }
            else{
                $alert ="<span class ='thanhcong'>Them that bai</span> ";
                return $alert;
            }  
        }
    }
 
    public function show_cust()
    {
        $squery = "SELECT * FROM tbl_khachhang order by khachhang_id asc" ;
        $result = $this ->db->select($squery);
        return $result;
    }
    public function update_cus($cusname,$cusaddress,$cusnumber,$cusemail,$id)
    {
        $cusname= $this ->fm->validation($cusname);
        $cusname = mysqli_real_escape_string($this->db->link,$cusname);
        $cusaddress= $this ->fm->validation($cusaddress);
        $cusaddress=mysqli_real_escape_string($this->db->link,$cusaddress);
        $cusnumber= $this ->fm->validation($cusnumber);
        $cusnumber=mysqli_real_escape_string($this->db->link,$cusnumber);
        $cusemail= $this ->fm->validation($cusemail);
        $cusemail=mysqli_real_escape_string($this->db->link,$cusemail);
        $id = mysqli_real_escape_string($this->db->link,$id);

        if(empty($cusname)&&empty($cusaddress)&&empty($cusnumber)&&empty($cusemail))
        {
            $alert = "<span class ='thanhcong'>Vui long dien ten khach hang</span>";
            return $alert;
        }
        else{
            $squery = "UPDATE tbl_khachhang SET name = '$cusname' , address = '$cusaddress' , phone = '$cusnumber' , email= '$cusemail'  WHERE khachhang_id = '$id'";
            $result = $this ->db->insert($squery);
            if($result){
                $alert ="<span class ='thanhcong'>Sua thanh cong</span> ";
                header('Location:QLKH.php');
                return $alert;
            }
            else{
                $alert ="<span class ='thanhcong'>Sua that bai</span> ";
                return $alert;
            }  
        }
    }

    public function getcusbyid($id)
    {
        $squery = "SELECT * FROM tbl_khachhang WHERE khachhang_id ='$id'" ;
        $result = $this ->db->select($squery);
        return $result;
    }
    public function del_cus($id)
    {
        $squery = "DELETE FROM tbl_khachhang WHERE khachhang_id ='$id'" ;
        $result = $this ->db->delete($squery);
        if($result){
            $alert ="<span class ='thanhcong'>xoa thanh cong</span> ";
            return $alert;
        }
        else{
            $alert ="<span class ='thanhcong'>xoa that bai</span> ";
            return $alert;
        } 
    }
    public function insert_customers($data){
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        if($name=="" || $email=="" || $address=="" || $phone =="" || $password ==""){
            $alert = "<span class='error'>Bạn phải điền đầy đủ</span>";
            return $alert;
        }else{
            $check_email = "SELECT * FROM tbl_khachhang WHERE email = '$email' LIMIT 1";
            $result_check = $this->db->select($check_email);
            if($result_check){
                $alert = "<span class='error'>Email đã tồn tại, vui lòng sử dụng email khác.</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_khachhang (name,email,address,phone,password) VALUES('$name','$email','$address','$phone','$password')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<center><span class='success'>Tạo tài khoản thành công</span></center>";
                    return $alert;
                }else{
                    $alert = "<center><span class='error'>Tạo tài khoản không thành công</span><c/enter>";
                    return $alert;
                }
            }
        }
    }
    public function login_customers($data){
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        if($email=='' || $password==''){
            $alert = "<center><span class='error'>Vui lòng điền tài khoản, mật khẩu</span></center>";
            return $alert;
        }else{
            $check_login = "SELECT * FROM tbl_khachhang WHERE email='$email' AND password='$password'";
            $result_check = $this->db->select($check_login);
            if($result_check){

                $value = $result_check->fetch_assoc();
                Session::set('customer_login',true);
                Session::set('khachhang_id',$value['khachhang_id']);
                Session::set('customer_name',$value['name']);
                Session::set('address',$value['address']);
                Session::set('phone',$value['phone']);
                echo "<script>window.location.href='giohang.php'</script>";
            }else{
                $alert = "<center><span class='error'>Tài khoản hoặc mật khẩu sai</span></center>";
                return $alert;
            }
        }
    }
}

?>