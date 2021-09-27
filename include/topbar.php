<div class="header">
        <header>
            <div class="container">
                <input type="checkbox" name="" id="check">
                
                <div class="logo-container">
                    <a href="index.php"><h3 class="logo">X<span>Store</span></h3></a>
                </div>

                <div class="nav-btn">
                    <div class="nav-links">
                        <ul>
                            <li class="nav-link" style="--i: .6s">
                                <a href="index.php">Trang chủ</a>
                            </li>
                            <li class="nav-link" style="--i: .85s">
                                <a href="index.php">Danh mục sản phẩm<i class="fas fa-caret-down"></i></a>
                                <div class="dropdown">
                                    <ul>
                                        <?php
											while($row_category = mysqli_fetch_array($sql_category)){
										?>
                                        <li class="dropdown-link" value="<?php echo $row_category['category_id'] ?>">
                                            <a href="?quanly=danhmuc&id=<?php echo $row_category['category_id'] ?>"><?php echo $row_category['category_name']  ?></a>
                                        </li>
                                        <?php
											}
										?>
                                        <div class="arrow"></div>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-link" style="--i: 1.35s">
                                <a href="?quanly=login">Đăng nhập</a>
                            </li>
                            <li class="nav-link" style="--i: 1.35s">
                                <a href="#">Đăng ký</a>
                            </li>
                        </ul>
                    </div>

                    <div class="log-sign" style="--i: 1.8s">
                        <a href="?quanly=giohang" class="btn solid">Giỏ hàng</a>
                    </div>
                </div>
                <div class="hamburger-menu-container">
                    <div class="hamburger-menu">
                        <div></div>
                    </div>
                </div>
            </div>
        </header>
    </div>