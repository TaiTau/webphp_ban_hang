<?php
    include '../lib/database.php';
    include '../config/format.php';
    include_once '../config/config.php';
?>

<?php
class brandadd
{
    private $fm;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_brand($brandname)
    {
        $brandname= $this ->fm->validation($brandname);
        $brandname = mysqli_real_escape_string($this->db->link,$brandname);

        if(empty($brandname))
        {
            $alert = "<span class ='thanhcong'>Vui long dien ten san pham</span>";
            return $alert;
        }
        else{
            $squery = "INSERT INTO tbl_category(category_name) VALUES('$brandname')";
            $result = $this ->db->insert($squery);
            if($result){
                $alert ="<span class ='thanhcong'>Them thanh cong</span> ";
                return $alert;
            }
            else{
                $alert ="<span class ='thanhcong'>Them that bai</span> ";
                return $alert;
            }
            
    }}
    public function show_brand()
    {
        $squery = "SELECT * FROM tbl_category order by category_id asc" ;
        $result = $this ->db->select($squery);
        return $result;
    }
    public function update_brand($brandname,$id)
    {
        $brandname= $this ->fm->validation($brandname);
        $brandname = mysqli_real_escape_string($this->db->link,$brandname);
        $id = mysqli_real_escape_string($this->db->link,$id);
        if(empty($brandname))
        {
            $alert = "<span class ='thanhcong'>Vui long dien ten thuong hieu</span>";
            return $alert;
        }
        else{
            $squery = "UPDATE tbl_category SET category_name = '$brandname' WHERE category_id = '$id'";
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

    public function getbrandbyid($id)
    {
        $squery = "SELECT * FROM tbl_category WHERE category_id ='$id'" ;
        $result = $this ->db->select($squery);
        return $result;
    }
    public function del_brand($id)
    {
        $squery = "DELETE FROM tbl_category WHERE category_id ='$id'" ;
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