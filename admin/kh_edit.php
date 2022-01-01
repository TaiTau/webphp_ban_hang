<?php
  include '../include/header_admin.php';
  include '../include/sidebar_admin.php';
  include '../classes/khadd.php';
?>
<?php
 $cus = new khadd();
if (!isset($_GET['khachhang_id']) || $_GET['khachhang_id'] ==NULL){
echo "<script>window.location ='QLKH.php'</script>";
}

else
{
    $id = $_GET['khachhang_id'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cusname = $_POST['cusname'];
    $cusaddress = $_POST['cusaddress'];
    $cusnumber = $_POST['cusnumber'];
    $cusemail = $_POST['cusemail'];
    $updatecus =$cus->update_cus($cusname,$cusaddress,$cusnumber,$cusemail,$id);
}


?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Sửa thông tin khách hàng</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <?php
                    $getcusname = $cus->getcusbyid($id);
                    if($getcusname){
                    while($result = $getcusname->fetch_assoc()){
                    
                  ?>
                  <form action="" method="post">
                    <table class="table">
                      <thead class=" text-primary">
                        
                        <th>
                          Họ và tên
                          
                        </th>
                        <th>
                          Địa chỉ
                        </th>
                        <th>
                          Số điện thoại
                        </th>
                        <th>
                      Email
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          
                          <td>
                          <input type="text" value="<?php echo $result['name']?>" name="cusname">
                          </td>
                          <td>
                          <input type="text" value="<?php echo $result['address']?>" name="cusaddress">
                          </td>
                          <td>
                          <input type="text" value="<?php echo $result['phone']?>" name="cusnumber"> 
                          </td>
                          <td>
                          <input type="text" value="<?php echo $result['email']?>" name="cusemail"> 
                          </td>
                          
                        </tr>
                        
                      </tbody>
                      
                    </table>
                    
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            
                 
                  </form>
                  <?php
                    }}
                  ?>
                  <?php
                if(isset($update_cus)){
                  echo $update_cus;
                }
                  ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <?php
  include '../include/footer_admin.php';
?>