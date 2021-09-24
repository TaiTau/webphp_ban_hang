<?php
	$filepath = realpath(dirname(__FILE__));
	include ($filepath.'/../lib/session.php');
	Session::checkLogin();
	include_once($filepath.'/../lib/database.php');
	include_once($filepath.'/../config/format.php');
?>

<?php
class adminlogin
{
    private $fm;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function login_admin($username,$password)
    {
        $username = $this ->fm->validation($username);
        $password = $this ->fm->validation($password);

        $username = mysqli_real_escape_string($this->db->link,$username);
        $password = mysqli_real_escape_string($this->db->link,$password);

        if(empty($password)|| empty($username))
        {
            $alert = "Vui long dien tai khoan va mat khau";
            return $alert;
        }
        else{
            $squery = "SELECT * FROM users WHERE username ='$username' and password = '$password' LIMIT 1";
            $result = $this ->db->select($squery);

            if($result!= false)
            {
                $value = $result -> fetch_assoc();
                Session::set('adminlogin',true);
                Session::set('username', $value['username']);
                header('Location:indexadmin.php');
            }
            else
            {
                $alert = "tai khoan hoac mat khau sai";
                return $alert;
            }
        }
    }
    public function admin_check()
    {
        
    
    }
    public function admin_destroy()
    {
        
    }
}
?>