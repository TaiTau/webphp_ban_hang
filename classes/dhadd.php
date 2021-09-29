<?php
    include '../lib/database.php';
    include '../config/format.php';
    include_once '../config/config.php';
?>

<?php
class order
{
    private $fm;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    public function insert_order($productname,$orderquan, $cus_id, $orderprice)
    {
        $productname= $this ->fm->validation($productname);
        $cus_id = $this ->fm->validation($cus_id);
        $orderquan= $this ->fm->validation($orderquan);
        $orderprice= $this ->fm->validation($orderprice);

        $productname = mysqli_real_escape_string($this->db->link,$productname);
        $orderquan= mysqli_real_escape_string($this->db->link, $orderquan);
        $cus_id= mysqli_real_escape_string($this->db->link, $cus_id);
        $orderprice= mysqli_real_escape_string($this->db->link, $orderprice);

        if(empty($ordedate)&&empty($productname)&&empty($orderquan))
        {
            $alert = "<span class ='thanhcong'>Vui long dien ten khach hang</span>";
            return $alert;
        }
        else{
            $squery = "INSERT INTO tbl_donhang(sanpham_id,soluong,khachhang_id ,ngaythang) VALUES('$productname','$orderquan','$cus_id','$orderprice')";
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
 
    public function show_order()
    {
        $squery = "SELECT * FROM tbl_donhang order by donhang_id asc" ;
        $result = $this ->db->select($squery);
        return $result;
    }
    public function get_amount($cus_id){
        $query = "SELECT tongtien FROM tbl_donhang WHERE khachhang_id = '$cus_id'";
        $get_price = $this->db->select($query);
        return $get_price;
    }
    public function update_cus($sanpham_id,$khachhang_id,$soluong,$ngaythang,$id)
    {
        $sanpham_id= $this ->fm->validation($sanpham_id);
        $sanpham_id = mysqli_real_escape_string($this->db->link,$sanpham_id);
        $khachhang_id= $this ->fm->validation($khachhang_id);
        $khachhang_id = mysqli_real_escape_string($this->db->link,$khachhang_id);
        $soluong= $this ->fm->validation($soluong);
        $soluong = mysqli_real_escape_string($this->db->link,$soluong);
        $ngaythang= $this ->fm->validation($ngaythang);
        $ngaythang = mysqli_real_escape_string($this->db->link,$ngaythang);


        $id = mysqli_real_escape_string($this->db->link,$id);
        if(empty($sanpham_id)&&empty($khachhang_id)&&empty($soluong)&&empty($ngaythang))
        {
            $alert = "<span class ='thanhcong'>Vui long dien ten khach hang</span>";
            return $alert;
        }
        else{
            $squery = "UPDATE tbl_donhang SET sanpham_id = '$sanpham_id',soluong = '$soluong',khachhang_id = '$khachhang_id',ngaythang = '$ngaythang' WHERE donhang_id = '$id'";
            $result = $this ->db->insert($squery);
            if($result){
                $alert ="<span class ='thanhcong'>Sua thanh cong</span> ";
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
        $squery = "SELECT * FROM tbl_donhang WHERE donhang_id ='$id'" ;
        $result = $this ->db->select($squery);
        return $result;
    }
    public function del_order($id)
    {
        $squery = "DELETE FROM tbl_donhang WHERE donhang_id ='$id'" ;
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
}

?>