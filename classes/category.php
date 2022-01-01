<?php
    include '../lib/database.php';
    include '../config/format.php';
?>

<?php
class category
{
    private $fm;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_cat($catname)
    {
        $catname = $this ->fm->validation($catname);
        $catname = mysqli_real_escape_string($this->db->link,$catname);

        if(empty($catname))
        {
            $alert = "<span class ='thanhcong'>Vui long dien ten san pham</span>";
            return $alert;
        }
        else{
            $squery = "INSERT INTO category_pro(cat_name) VALUES('$catname')";
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
    public function admin_check()
    {
        
    
    }
    public function admin_destroy()
    {
        
    }
}
?>