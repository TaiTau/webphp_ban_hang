<?php
  include '../include/header_admin.php';
  include '../include/sidebar_admin.php';
  include '../classes/usera.php';
?>
<?php
 $user = new user();
if (!isset($_GET['user_id']) || $_GET['user_id'] ==NULL){
echo "<script>window.location ='userlist.php'</script>";
}

else
{
    $id = $_GET['user_id'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $username = $_POST['username'];
  $useremail = $_POST['user_email'];
  $fullname = $_POST['fullname'];
  $useradress = $_POST['user_address'];
    $updateuser =$user->update_user($username,$useremail,$useradress,$fullname,$id);
}


?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Chỉnh sửa hồ sơ</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                <?php
                    $getusername = $user->getuserbyid($id);
                    if($getusername){
                    while($result = $getusername->fetch_assoc()){
                    
                  ?>
                  <form action="" method="post">
                    <div class="row">
                   
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tên người dùng</label>
                          <input type="text" class="form-control" value="<?php
                             echo $result['username'];
                            ?>" name="username">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" class="form-control" value="<?php
                             echo $result['user_email'];
                            ?>" name="user_email">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Họ và Tên</label>
                          <input type="text" class="form-control" value="<?php
                             echo $result['fullname'];
                            ?>" name="fullname">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Địa chỉ</label>
                          <input type="text" class="form-control" value="<?php
                             echo $result['user_address'];
                            ?>" name="user_address">
                        </div>
                      </div>
                    </div>
                
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Ghi chú</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Ghi chú thêm thông tin.</label>
                            <textarea class="form-control" rows="5"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Cập nhật hồ sơ</button>
                    <div class="clearfix"></div>
                  </form>
                  <?php
                    }}
                  ?>
                  <?php
                if(isset($updateuser)){
                  echo $updateuser;
                }
                  ?>
                </div>
              </div>
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