<?php
  include '../include/header_admin.php';
  include '../include/sidebar_admin.php';
  include '../classes/product.php';
?>
<?php
 $pro = new productadd();
if (!isset($_GET['sanpham_id']) || $_GET['sanpham_id'] ==NULL){
echo "<script>window.location ='DSSP.php'</script>";
}

else
{
    $id = $_GET['sanpham_id'];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    
    $updateProduct = $pro->update_pro($_POST,$_FILES, $id);
    
}

?>

<body class="">
  <div class="wrapper ">
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Sửa thông tin sản phẩm</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <?php
                if(isset($updateProduct)){
                  echo $updateProduct;
                }
                  ?>
                  <?php
                    $getproname = $pro->getprobyid($id);
                    if($getproname){
                    while($result = $getproname->fetch_assoc()){
                    
                  ?>
                  <form action="" method="post" enctype="multipart/form-data">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Tên
                        </th>
                        <th>
                          Số lượng
                        </th>
                        <th>
                          Ảnh
                        </th>
                        <th>
                          Giá
                        </th>
                        <th>
                      Giá khuyến mãi
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <input type="text" value="<?php echo $result['sanpham_name']?>" name="sanpham_name">
                          </td>
                          <td>
                          <input type="text" value="<?php echo $result['sanpham_soluong']?>" name="sanpham_soluong">
                          </td>
                          <td>
                          <img src="../uploads/<?php echo  $result['sanpham_image']; ?>" width="50">
                          <input type="file" name="sanpham_image" />
                          </td>
                          <td>
                          <input type="text" value="<?php echo $result['sanpham_gia']?>" name="sanpham_gia"> 
                          </td>
                          <td >
                          <input type="text" value="<?php echo $result['sanpham_giakhuyenmai']?>" name="sanpham_giakhuyenmai"> 
                          </td>
                          
                        </tr>
                        
                      </tbody>
                      
                    </table>
                    
            <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
            
                 
                  </form>
                  <?php
                    }}
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