<?php
    include_once '../lib/database.php';
    include_once '../config/format.php';
    include_once '../config/config.php';
?>

<?php
class productadd
{
    private $fm;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    
  
 
    public function show_pro()
    {
        $squery = "SELECT * FROM tbl_sanpham order by sanpham_id asc" ;
        $result = $this ->db->select($squery);
        return $result;
    }
    public function update_pro($data,$files,$id)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['sanpham_name']);
        $sanphamgia = mysqli_real_escape_string($this->db->link, $data['sanpham_gia']);
        $sanpham_soluong = mysqli_real_escape_string($this->db->link, $data['category_id']);
        $sanpham_giakm = mysqli_real_escape_string($this->db->link, $data['sanpham_giakhuyenmai']);
        //Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
        $permited  = array('jpg', 'jpeg', 'png', 'gif');

        $file_name = $_FILES['sanpham_image']['name'];
        $file_size = $_FILES['sanpham_image']['size'];
        $file_temp = $_FILES['sanpham_image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        // $file_current = strtolower(current($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "../uploads/".$unique_image;


        if($productName=="" || $sanphamgia=="" || $sanpham_soluong=="" || $sanpham_giakm==""){
            $alert = "<span class='error'>Fields must be not empty</span>";
            return $alert;
        }else{
            if(!empty($file_name)){
                //Nếu người dùng chọn ảnh
                if ($file_size > 204800) {

                 $alert = "<span class='success'>Image Size should be less then 2MB!</span>";
                return $alert;
                } 
                elseif (in_array($file_ext, $permited) === false) 
                {
                 // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
                $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
                return $alert;
                }
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "UPDATE tbl_sanpham SET

                sanpham_name = '$productName',
                sanpham_gia = '$sanphamgia',
                category_id = '$sanpham_soluong', 
                sanpham_giakhuyenmai = '$sanpham_giakm', 
                sanpham_image = '$unique_image'

                WHERE sanpham_id = '$id'";
                
            }else{
                //Nếu người dùng không chọn ảnh
                $query = "UPDATE tbl_sanpham SET

                sanpham_name = '$productName',
                sanpham_gia = '$sanphamgia',
                category_id = '$sanpham_soluong', 
                sanpham_giakhuyenmai = '$sanpham_giakm'
                WHERE sanpham_id = '$id'";
                
            }
            $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Product Updated Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Product Updated Not Success</span>";
                    return $alert;
                }
            
        }

    }

    public function getprobyid($id)
    {
        $squery = "SELECT * FROM tbl_sanpham WHERE sanpham_id ='$id'" ;
        $result = $this ->db->select($squery);
        return $result;
    }
    public function del_pro($id)
    {
        $squery = "DELETE FROM tbl_sanpham WHERE sanpham_id ='$id'" ;
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
    public function insert_product($data,$files){

        $product_name = mysqli_real_escape_string($this->db->link,$data['sanpham_name']);
        $product_price = mysqli_real_escape_string($this->db->link,$data['sanpham_gia']); 
        $product_soluong = mysqli_real_escape_string($this->db->link,$data['category_id']);
        $product_pricekm = mysqli_real_escape_string($this->db->link,$data['sanpham_giakm']);
        $product_mota = mysqli_real_escape_string($this->db->link,$data['sanpham_mota']);


        $permited = array('jpg','png','gif','jpeg');
        $file_name = $_FILES['sanpham_image']['name'];
        $file_size = $_FILES['sanpham_image']['size'];
        $file_temp = $_FILES['sanpham_image']['tmp_name'];

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "../uploads/".$unique_image;
        if($product_name == "" || $product_price == "" || $product_soluong == "" || $product_pricekm == "" ||  $file_name == "" || $product_mota == ""){
            $alert = "<span class = 'error'>Bạn phải điền đủ các trường</span>";
            return $alert;
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO tbl_sanpham(sanpham_name,sanpham_gia,category_id,sanpham_image,sanpham_giakhuyenmai,sanpham_mota) VALUES('$product_name','$product_price','$product_soluong','$unique_image','$product_pricekm','$product_mota') LIMIT 1";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class = 'success'>Thêm thành công </span>";
                return $alert;
            }else{
                $alert = "<span class = 'success'>Thêm thất bại</span>";
                return $alert;
            }

        }

    }
}

?>