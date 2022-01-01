<?php
  include '../include/header_admin.php';
  include '../include/sidebar_admin.php';
  include '../classes/khadd.php';
?>

<?php
 $pro = new khadd();
 if (isset($_GET['delid'])){
      $id = $_GET['delid'];
      
    $delbl =$pro->del_bl($id);
  }
  
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Danh sách bình luận</h4>
                  <?php
                if(isset($delcus)){
                  echo $delcus;
                }
                  ?>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Bình luận
                        </th>
                        <th>
                          Tên khách hàng
                        </th>
                        <th>
                          ID Sản phẩm 
                        </th>
                        <th >Quản lý</th>
                      </thead>
                      <tbody>
                      <?php
                          $show_pro = $pro->show_bladmin();
                          if(isset($show_pro))
                          {
                            $i = 0;
                                while($result = $show_pro->fetch_assoc()){
                                  $i++;
                                
                          
                        ?>
                        <tr onclick="">
                          <td>
                          <?php
                            echo $result['binhluan_id'];
                            ?>
                          </td>
                          <td>
                          <?php
                          echo $result['binhluan'];
                            ?>
                          </td>
                          <td>
                          <?php
                          echo $result['ten_kh'];
                            ?>
                          </td>
                          <td>
                          <?php
                          echo $result['sanpham_id'];
                            ?>
                          
                          </td>
                          
                          <td >
                                  <!-- Call to action buttons -->
                                       <li class="list-inline-item" style="text-align: center;">
                                       <a onclick="return confirm('Are you want to delete?')" href="?delid=<?php echo $result['binhluan_id'];?>"><button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
                                           </li>
                          </td>
                        </tr>
                        <?php
                            }}
                            ?>
                        
                        
                        
                      </tbody>
                    </table>
                   
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
  </div>
  <script>
    function sua(){
      location.assign("admin/suasp.php")
    }
  </script>
  <?php
 include '../include/footer_admin.php';
?>