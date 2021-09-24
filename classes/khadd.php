<?php
    include '../lib/database.php';
    include '../config/format.php';
    include_once '../config/config.php';
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
            $squery = "UPDATE tbl_khachhang SET ten = '$cusname' , address = '$cusaddress' , phone = '$cusnumber' , email= '$cusemail'  WHERE khachhang_id = '$id'";
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
}

?>