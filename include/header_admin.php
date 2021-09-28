<?php
  ob_start();
  include '../lib/session.php';
  Session::checkSession();
  ob_flush();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Admin</title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<link href="../assets/demo/demo.css" rel="stylesheet" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
<link rel="stylesheet" href="../static/css/AdminLTE.min.css" />
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
</head>
<body class="">
  <div class="wrapper ">
<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <div class="logo"><a href="../admin/indexadmin.php" class="simple-text logo-normal">
          admin
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="../admin/indexadmin.php">
              <i class="material-icons">dashboard</i>
              <p>Trang chủ</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../admin/userlist.php">
              <i class="material-icons">person</i>
              <p>Hồ sơ</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../admin/QLDM.php">
              <i class="material-icons">content_paste</i>
              <p>Quản lý danh mục</p>
            </a>
            
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="javascript: toggleChildren('cat1');">
              <i class="material-icons">content_paste</i>
              <p>Quản lý sản phẩm</p>
            </a>
            <div class="sub_cat_box"  id="cat1">
            <ul class ="ulcon">
            <li class="nav-item ">
            <a class="nav-link" href="../admin/DSSP.php">
              <i class="material-icons">content_paste</i>
              <p>Danh sách sản phẩm</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../admin/themsp.php">
              <i class="material-icons">content_paste</i>
              <p>Thêm sản phẩm</p>
            </a>
          </li>
            </ul>
            </div>
          </li>
          <li class="nav-item ">
          <a class="nav-link" href="javascript: toggleChildren('cat2');">
              <i class="material-icons">library_books</i>
              <p>Quản lý khách hàng</p>
            </a>
            <div class="sub_cat_box"  id="cat2">
            <ul class ="ulcon">
            <li class="nav-item ">
            <a class="nav-link" href="../admin/QLKH.php">
              <i class="material-icons">library_books</i>
              <p>Danh sách khách hàng</p>
            </a> </li>
            <li class="nav-item ">
            <a class="nav-link" href="../admin/themkh.php">
              <i class="material-icons">library_books</i>
              <p>Thêm khách hàng</p>
            </a> </li>
            </ul>
            </div>
          </li>
          <li class="nav-item ">
          <a class="nav-link" href="javascript: toggleChildren('cat3');">
              <i class="material-icons">bubble_chart</i>
              <p>Quản lý đơn hàng</p>
            </a>
            <div class="sub_cat_box"  id="cat3">
            <ul class ="ulcon">
            <li class="nav-item ">
            <a class="nav-link" href="../admin/QLDH.php">
              <i class="material-icons">bubble_chart</i>
              <p>Danh sách đơn hàng</p>
            </a>
          </li>
            </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
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
                  <a class="dropdown-item" href="../admin/userlist.php">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <?php
                  if(isset($_GET['action']) && $_GET['action'] == 'logout')
                  {
                        Session::destroy();
                  }
                  ?>
                  <a class="dropdown-item" href="?action=logout"> Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>