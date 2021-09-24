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
                  <?php
                  if(isset($_GET['action']) && $_GET['action'] == 'logout')
                  {
                        Session::destroy();
                  }
                  
                  ?>
                  <a class="dropdown-item" href="?action=logout">Log out</a>
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
                          Giá
                        </th>
                        <th>
                        Giá khuyến mãi
                        </th>
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
                            echo $i;
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