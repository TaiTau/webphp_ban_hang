<?php
    include_once '../lib/database.php';
    include_once '../config/format.php';
    include_once '../config/config.php';
?>

<?php
class user
{
    private $fm;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    public function show_user()
    {
        $squery = "SELECT * FROM users order by user_id asc" ;
        $result = $this ->db->select($squery);
        return $result;
    }
    public function update_user($username,$useremail,$useradress,$fullname,$id)
    {
        $username= $this ->fm->validation($username);
        $username = mysqli_real_escape_string($this->db->link,$username);
        $useremail= $this ->fm->validation($useremail);
        $useremail= mysqli_real_escape_string($this->db->link,$useremail);
        $useradress= $this ->fm->validation($useradress);
        $useradress= mysqli_real_escape_string($this->db->link,$useradress);
        $fullname= $this ->fm->validation($fullname);
        $fullname= mysqli_real_escape_string($this->db->link,$fullname);
        $id = mysqli_real_escape_string($this->db->link,$id);
        if(empty($username)&&empty($useremail)&&empty($useradress))
        {
            $alert = "<span class ='thanhcong'>Vui long dien ten khach hang</span>";
            return $alert;
        }
        else{
            $squery = "UPDATE users SET username = '$username' , user_email = '$useremail', fullname='$fullname', user_address = '$useradress' WHERE user_id = '$id'";
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
    public function getuserbyid($id)
    {
        $squery = "SELECT * FROM users WHERE user_id ='$id'" ;
        $result = $this ->db->select($squery);
        return $result;
    }
    public function del_user($id)
    {
        $squery = "DELETE FROM user WHERE user_id ='$id'" ;
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