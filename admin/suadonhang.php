<?php
  include '../include/header_admin.php';
  include '../include/sidebar_admin.php';
  include '../classes/dhadd.php';
?>
<?php
 $dh = new order();
if (!isset($_GET['donhang_id']) || $_GET['donhang_id'] ==NULL){
echo "<script>window.location ='QLDH.php'</script>";
}

else
{
    $id = $_GET['donhang_id'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sanpham_id = $_POST['cusname'];
    $khachhang_id = $_POST['cusaddress'];
    $soluong = $_POST['cusnumber'];
    $ngaythang = $_POST['cusemail'];
    $updatecus =$dh->update_cus($sanpham_id,$khachhang_id,$soluong,$ngaythang,$id);
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
                    $getcusname = $dh->getcusbyid($id);
                    if($getcusname){
                    while($result = $getcusname->fetch_assoc()){
                    
                  ?>
                  <form action="" method="post">
                    <table class="table">
                      <thead class=" text-primary">
                        
                        <th>
                         ID sản phẩm
                          
                        </th>
                        <th>
                          ID khách hàng
                        </th>
                        <th>
                          Số lượng
                        </th>
                        <th>
                      Ngày tháng
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          
                          <td>
                          <input type="text" value="<?php echo $result['sanpham_id']?>" name="cusname">
                          </td>
                          <td>
                          <input type="text" value="<?php echo $result['khachhang_id']?>" name="cusaddress">
                          </td>
                          <td>
                          <input type="text" value="<?php echo $result['soluong']?>" name="cusnumber"> 
                          </td>
                          <td>
                          <input type="text" value="<?php echo $result['ngaythang']?>" name="cusemail"> 
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