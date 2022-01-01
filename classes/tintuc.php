<?php
    include_once '../lib/database.php';
    include_once '../config/format.php';
    include_once '../config/config.php';
?>

<?php
class tintuc
{
    private $fm;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    
  
 
    public function show_tintuc()
    {
        $squery = "SELECT * FROM tbl_tintuc order by id asc" ;
        $result = $this ->db->select($squery);
        return $result;
    }
    public function update_tintuc($data,$files,$id)
    {
        $tomtat = mysqli_real_escape_string($this->db->link, $data['tomtat']);
        $danhmuc = mysqli_real_escape_string($this->db->link, $data['danhmuc']);
        $tacgia = mysqli_real_escape_string($this->db->link, $data['tacgia']);
        $tieude = mysqli_real_escape_string($this->db->link, $data['tieude']);
        $noidung = mysqli_real_escape_string($this->db->link,$data['noidung']);
        //Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
        $permited  = array('jpg', 'jpeg', 'png', 'gif');

        $file_name = $_FILES['hinhanh']['name'];
        $file_size = $_FILES['hinhanh']['size'];
        $file_temp = $_FILES['hinhanh']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        // $file_current = strtolower(current($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "../uploads/".$unique_image;


        if( $noidung=="" || $tomtat=="" ){
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
                $query = "UPDATE tbl_tintuc SET
                noidung  ='$noidung',
                danhmuc  ='$danhmuc',
                tacgia  ='$tacgia',
                tieude  ='$tieude',
                tomtat = '$tomtat', 
                hinhanh = '$unique_image'

                WHERE id = '$id'";
                
            }else{
                //Nếu người dùng không chọn ảnh
                $query = "UPDATE tbl_tintuc SET
                noidung  ='$noidung',
                danhmuc  ='$danhmuc',
                tacgia  ='$tacgia',
                tieude  ='$tieude',
                tomtat = '$tomtat'
                WHERE id = '$id'";
                
            }
            $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Cập nhật tin tức thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Cập nhật tin tức thất bại</span>";
                    return $alert;
                }
            
        }

    }

    public function getprobyid($id)
    {
        $squery = "SELECT * FROM tbl_tintuc WHERE id ='$id'" ;
        $result = $this ->db->select($squery);
        return $result;
    }
    public function del_pro($id)
    {
        $squery = "DELETE FROM tbl_tintuc WHERE id ='$id'" ;
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
    public function insert_tt($data,$files){

        $danhmuc = mysqli_real_escape_string($this->db->link,$data['danhmuc']);
        $tomtat = mysqli_real_escape_string($this->db->link,$data['tomtat']); 
        $tacgia= mysqli_real_escape_string($this->db->link,$data['tacgia']); 
        $tieude = mysqli_real_escape_string($this->db->link,$data['tieude']); 
        $noidung = mysqli_real_escape_string($this->db->link,$data['noidung']);

        $permited = array('jpg','png','gif','jpeg');
        $file_name = $_FILES['hinhanh']['name'];
        $file_size = $_FILES['hinhanh']['size'];
        $file_temp = $_FILES['hinhanh']['tmp_name'];

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "../uploads/".$unique_image;
        if($danhmuc == "" || $tomtat == "" || $noidung == ""  ||  $file_name == "" ){
            $alert = "<span class = 'error'>Bạn phải điền đủ các trường</span>";
            return $alert;
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO tbl_tintuc(danhmuc,tomtat,tacgia,tieude,noidung,hinhanh) VALUES('$danhmuc','$tomtat','$tacgia','$tieude','$noidung','$unique_image') LIMIT 1";
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