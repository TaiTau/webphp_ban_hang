<?php
    include('slider.php');
?>
<div class="home">
    <div class = "products">
        <div class = "containerhome">
            <h1 class = "lg-title">Sản phẩm hot</h1>
            <div class = "product-items">
                <!-- single product -->
                <?php
                $sql_product = mysqli_query($con,'SELECT * FROM tbl_sanpham ORDER BY category_id DESC');
                    while($row_sanpham = mysqli_fetch_array($sql_product)){
                ?>
                <div class = "product">
                    <div class = "product-content">
                        <div class = "product-img">
                            <img src = "uploads/<?php echo $row_sanpham['sanpham_image'] ?>" alt = "product image">
                        </div>
                        <div class = "product-btns">
                            <a href="?quanly=chitiet&id=<?php echo $row_sanpham['sanpham_id'] ?>">
                                <button type = "submit" name="themgiohang" class = "btn-cart"> Xem chi tiết
                                    <span><i class = "fas fa-plus"></i></span>
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class = "product-info">
                        <a href = "?quanly=chitiet&id=<?php echo $row_sanpham['sanpham_id'] ?>" class = "product-name"><?php echo $row_sanpham['sanpham_name'] ?></a>
                        <p class = "product-price"><?php echo number_format($row_sanpham['sanpham_gia']).'₫'?></p>
                        <p class = "product-price"><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']).'₫'?></p>
                    </div>

                    <div class = "off-info">
                        <h2 class = "sm-title">5% off</h2>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>

        <div class = "containerhome">
            <h1 class = "lg-title">Chuyên trang thương hiệu</h1>
            <ul style="display: flex; justify-content: center;">
                <li style="padding:20px;"><img src="images/thuonghieuss.png" alt=""></li>
                <li style="padding:20px;"><img src="images/thuonghieuip.png" alt=""></li>
                <li style="padding:20px;"><img src="images/thuonghieulnv.png" alt=""></li>
            </ul>
        </div>
    </div>       
</div>
<br>