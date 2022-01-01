<?php
  include '../include/header_admin.php';
  include '../include/sidebar_admin.php';
  include '../classes/tintuc.php';
?>

<?php
 $pro = new tintuc();
 if (isset($_GET['delid'])){
      $id = $_GET['delid'];
      
    $delbl =$pro->del_pro($id);
  }
  
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Danh sách tin tức</h4>
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
                        Danh mục
                        </th>
                        <th>
                        Hình ảnh
                        </th>
                        <th>
                         Tiêu đề
                        </th>
                        <th>
                         Tóm tắt
                        </th>
                        <th>
                         Tác giả
                        </th>
                        <th>
                          Nội dung
                        </th>
                        <th style="text-align: center;">Quản lý</th>
                      </thead>
                      <tbody>
                      <?php
                          $show_pro = $pro->show_tintuc();
                          if(isset($show_pro))
                          {
                            $i = 0;
                                while($result = $show_pro->fetch_assoc()){
                                  $i++;
                                
                          
                        ?>
                        <tr onclick="">
                          <td>
                          <?php
                            echo $result['id'];
                            ?>
                          </td>
                          <td>
                          <?php
                            echo $result['danhmuc'];
                            ?>
                          </td>
                          <td>
                          <img src="../uploads/<?php echo  $result['hinhanh']; ?>" width="50">
                          
                          </td>
                          <td>
                          <?php
                          echo $result['tieude'];
                            ?>
                          </td>
                          <td>
                          <?php
                          echo $result['tomtat'];
                            ?>
                          </td>
                          <td>
                          <?php
                          echo $result['tacgia'];
                            ?>
                          </td>
                          <td>
                          <?php
                          echo $result['noidung'];
                            ?>
                          </td>
                          
                          <td class="btn-edit">
                                  <!-- Call to action buttons -->
                                 
                                        
                                       <li class="list-inline-item">
                                       <a  href="editnew.php?id=<?php echo $result['id'];?>"><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
                                        </li>
                                       <li class="list-inline-item">
                                       <a onclick="return confirm('Are you want to delete?')" href="?delid=<?php echo $result['id'];?>"><button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
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