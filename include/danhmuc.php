<?php
	include_once('db/connect.php');
?>
<?php
	$sql_category = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');

?>
<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id = '';
	}
	$sql_cate = mysqli_query($con,"SELECT * FROM tbl_category,tbl_sanpham WHERE tbl_category.category_id=tbl_sanpham.category_id
	 AND tbl_sanpham.category_id='$id' ORDER BY tbl_sanpham.sanpham_id DESC");
    $sql_category = mysqli_query($con,"SELECT * FROM tbl_category,tbl_sanpham WHERE tbl_category.category_id=tbl_sanpham.category_id
	 AND tbl_sanpham.category_id='$id' ORDER BY tbl_sanpham.sanpham_id DESC");
    $row_dmuc = mysqli_fetch_array($sql_category);
    $dmuc = $row_dmuc['category_name'];
?>
<div class="home">
            <div class = "products">
                <div class = "containerhome">
                    <h1 class = "lg-title"><?php echo $dmuc ?></h1>
                    <div class = "product-items">
                        <!-- single product -->
                        <?php
					        while($row_sanpham = mysqli_fetch_array($sql_cate)){
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
            </div>
        </div>