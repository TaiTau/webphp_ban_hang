<?php
  include '../include/header_admin.php';
  include '../include/sidebar_admin.php';
  include '../classes/product.php';
?>

<?php
 $pro = new productadd();
 if (isset($_GET['delid'])){
      $id = $_GET['delid'];
      
    $delcus =$pro->del_pro($id);
  }
  
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Danh sách sản phẩm</h4>
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
                          Tên
                        </th>
                        <th>
                          Id danh mục
                        </th>
                        <th>
                          Ảnh
                        </th>
                        <th>
                          Số lượng
                        </th>
                        <!-- <th>
                          Sản phẩm hot
                        </th> -->
                        <th>
                          Giá
                        </th>
                        <th>
                        Giá khuyến mãi
                        </th>
                        <th style="text-align: center;">Quản lý</th>
                      </thead>
                      <tbody>
                      <?php
                          $show_pro = $pro->show_pro();
                          if(isset($show_pro))
                          {
                            $i = 0;
                                while($result = $show_pro->fetch_assoc()){
                                  $i++;
                                
                          
                        ?>
                        <tr onclick="">
                          <td>
                          <?php
                            echo $result['sanpham_id'];
                            ?>
                          </td>
                          <td>
                          <?php
                          echo $result['sanpham_name'];
                            ?>
                          </td>
                          <td>
                          <?php
                          echo $result['category_id'];
                            ?>
                          </td>
                          <td>
                          <img src="../uploads/<?php echo  $result['sanpham_image']; ?>" width="50">
                          
                          </td>
                          <td>
                          <?php
                          echo $result['sanpham_soluong'];
                            ?>
                          </td>
                          <!-- <td>
                          <?php
                          echo $result['sanpham_hot'];
                            ?>
                          </td> -->
                          <td >
                          <?php
                          echo number_format($result['sanpham_gia']).'₫';
                            ?>
                          </td>
                          <td >
                          <?php
                          echo number_format($result['sanpham_giakhuyenmai']).'₫';
                            ?>
                          </td>
                          <td class="btn-edit">
                                  <!-- Call to action buttons -->
                                 
                                        
                                       <li class="list-inline-item">
                                       <a  href="proedit.php?sanpham_id=<?php echo $result['sanpham_id'];?>"><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
                                        </li>
                                       <li class="list-inline-item">
                                       <a onclick="return confirm('Are you want to delete?')" href="?delid=<?php echo $result['sanpham_id'];?>"><button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
                                           </li>
                                  
                                 </td>
                        </tr>
                        <?php
                            }}
                            ?>
                        
                        
                        
                      </tbody>
                    </table>
                    <div class="col-md-12">
              <form action="suasp.php">
            <button type="button" class="btn btn-success">Tìm kiếm</button></form>
            
            </div>
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