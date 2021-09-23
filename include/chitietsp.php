<?php
	include_once('db/connect.php');
?>
<?php
	$sql_category = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');

?>
<div class="small-container single-product">
    <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }else{
            $id = '';
        }
        $sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_id='$id'");
    ?>
    <?php
        while($row_chitiet = mysqli_fetch_array($sql_chitiet)){
    ?>
    <div class="row">
        <div class="col-2">
            <img src="images/<?php echo $row_chitiet['sanpham_image'] ?>" data-imagezoom="true" alt="">
        </div>
        <div class="col-2">
            <p><?php echo $row_chitiet['sanpham_name'] ?></p>
            <h4><?php echo number_format($row_chitiet['sanpham_giakhuyenmai']).'₫'?></h4>
            <form action="?quanly=giohang" method="post">
                <input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['sanpham_name'] ?>">
                <input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet['sanpham_id'] ?>">
                <input type="hidden" name="giasanpham" value="<?php echo $row_chitiet['sanpham_giakhuyenmai'] ?>">
                <input type="hidden" name="hinhanh" value="<?php echo $row_chitiet['sanpham_image'] ?>">
                <input type="hidden" name="soluong" value="1">
                <input type="submit" name="themgiohang" value="Thêm vào giỏ hàng" class="btn"></input>
            </form>
            <h3>Thông số kĩ thuật</h3>
            <p>AMD Ryzen™ 5-4600H, 3.00GHz upto 4.00GHz, 8MB cache, 6 cores 12 threads, 8MB Cache</p>
        </div>
    </div>
    <?php
	}
    ?>
</div>