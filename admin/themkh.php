<?php
  include '../include/header_admin.php';
  include '../include/sidebar_admin.php';
  include '../classes/khadd.php';
?>
<?php
 $cus = new khadd();
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$cusname = $_POST['cusname'];
    $cusaddr = $_POST['cusaddr'];
    $cus_num = $_POST['cus_num'];
    $cusemail = $_POST['cusemail'];
		$insertcus =$cus->insert_cus($cusname,$cusaddr,$cus_num,$cusemail) ;
	}

?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Thêm khách hàng</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
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
                          <input type="text"  name="cusname">
                          </td>
                          <td>
                          <input type="text" value="" name="cusaddr">
                          </td>
                          <td>
                          <input type="text" value=""  name="cus_num"> 
                          </td>
                         
                          <td>
                          <input type="text" value=""  name="cusemail"> 
                          </td>
                        </tr>
                        
                      </tbody>
                      
                    </table>
                    
            <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
            <?php
                if(isset($insert_cus)){
                  echo $insert_cus;
                }
                  ?>
                  </form>
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