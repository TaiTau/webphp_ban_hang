<?php
	include_once('db/connect.php');
?>
<?php
	$sql_category = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');

?>
<div class="product-details">
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
    <div class="wrapper">
      <div class="right">
        <div class="logo" style="color: #8d8d8d;"><?php echo $row_chitiet['sanpham_name'] ?></div>
        <h1 style="color: black;"><?php echo number_format($row_chitiet['sanpham_giakhuyenmai']).'₫'?></h1>
            <form action="?quanly=giohang" method="post">
                <input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['sanpham_name'] ?>">
                <input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet['sanpham_id'] ?>">
                <input type="hidden" name="giasanpham" value="<?php echo $row_chitiet['sanpham_giakhuyenmai'] ?>">
                <input type="hidden" name="hinhanh" value="<?php echo $row_chitiet['sanpham_image'] ?>">
                <input type="hidden" name="soluong" value="1">
                <input type="submit" name="themgiohang" value="Thêm vào giỏ hàng" class="btn"></input>
            </form>
        </div>
      <div class="left">
        <img src="uploads/<?php echo $row_chitiet['sanpham_image'] ?>" data-imagezoom="true" alt="">
      </div>
    </div>
    <div class="wrapper">
      <div class="bottom">
        <ul>
          <li>Chipset Apple A14 Bionic (5 nm)</li>
          <li>CPU	Hexa-core</li>
          <li>GPU	Apple GPU (4-core graphics)</li>
          <li>Dual	12 MP, f/2.2, 23mm (wide), 1/3.6"</li>
          <li>Loudspeaker	Yes, with stereo speakers</li>
          <li>USB	Lightning, USB 2.0</li>
        </ul>
      </div>
    </div>
    <?php
	}
    ?>
  </div>