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