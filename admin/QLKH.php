<?php
  include '../include/header_admin.php';
  include '../include/sidebar_admin.php';
  include '../classes/khadd.php';
?>
<?php
 $cus = new khadd();
 if (isset($_GET['delid'])){
      $id = $_GET['delid'];
      
    $delcus =$cus->del_cus($id);
  }
  
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Danh sách khách hàng</h4>
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
                        <?php
                          $show_cus = $cus->show_cust();
                          if(isset($show_cus))
                          {
                            $i = 0;
                                while($result = $show_cus->fetch_assoc()){
                                  $i++;
                                
                          
                        ?>
                        <tr>
                          <td>
                            <?php
                            echo $i;
                            ?>
                          </td>
                          <td>
                          <?php
                          echo $result['name'];
                            ?>
                          </td>
                          <td>
                          <?php
                          echo $result['address'];
                            ?>
                          </td>
                          <td>
                          <?php
                          echo $result['phone'];
                            ?>
                          </td>
                          <td>
                          <?php
                          echo $result['email'];
                            ?>
                          </td>
                          <td class="btn-edit">
                                  <!-- Call to action buttons -->
                                       <li class="list-inline-item">
                                         <a  href="kh_edit.php?khachhang_id=<?php echo $result['khachhang_id'];?>"><button class="btn btn-success btn-sm rounded-0"  data-toggle="tooltip" data-placement="top" title="Edit" type="button"><i class="fa fa-edit"></i></button></a> 

                                      
                                        </li>
                                       <li class="list-inline-item">
                                       <a onclick="return confirm('Are you want to delete?')" href="?delid=<?php echo $result['khachhang_id'];?>"><button class="btn btn-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a> 
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
            <div class="col-md-12">
            <button type="button" class="btn btn-success">Tìm kiếm</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose active" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
        </li>
        <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
        <li class="button-container">
          <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
            View Documentation
          </a>
        </li>
        <li class="button-container github-star">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
        </li>
      </ul>
    </div>
  </div>
  <?php
include '../include/footer_admin.php';
?>