<?php
	include_once('db/connect.php');
?>
<?php
	$sql_category = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');

?>
<?php
	$sql_cate_home = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
	while($row_cate_home = mysqli_fetch_array($sql_cate_home)){
		$id_category = $row_cate_home['category_id'];
	}
?>
<?php
    if(isset($_POST['themgiohang'])){
        $tensanpham = $_POST['tensanpham'];
        $sanpham_id = $_POST['sanpham_id'];
        $hinhanh = $_POST['hinhanh'];
        $gia = $_POST['giasanpham'];
        $soluong = $_POST['soluong'];
        
        $sql_select_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
		$count = mysqli_num_rows($sql_select_giohang);
		if($count>0){
			$row_sanpham = mysqli_fetch_array($sql_select_giohang);
			$soluong = $row_sanpham['soluong'] + 1;
			$sql_giohang = "UPDATE tbl_giohang SET soluong = '$soluong' WHERE sanpham_id = '$sanpham_id'";
		}else{
			$soluong = $soluong;
			$sql_giohang = "INSERT INTO tbl_giohang(tensanpham,sanpham_id,giasanpham,hinhanh,soluong) values ('$tensanpham','$sanpham_id','$gia','$hinhanh','$soluong')";
		}
		$insert_row = mysqli_query($con,$sql_giohang);
		if($insert_row==0){
			header('location:index.php?quanly=chitiet&id='.$sanpham_id);
        }
    }elseif(isset($_POST['capnhatsoluong'])){
		
		for($i=0;$i<count($_POST['product_id']);$i++){
			$sanpham_id = $_POST['product_id'][$i];
			$soluong = $_POST['soluong'][$i];
			if($soluong<=0){
				$sql_delete = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
			}else{
				$sql_update = mysqli_query($con,"UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id'");
			}
		}
	}elseif(isset($_GET['xoa'])){
		$id = $_GET['xoa'];
		$sql_delete = mysqli_query($con,"DELETE FROM tbl_giohang WHERE giohang_id='$id'");
	}elseif(isset($_POST['thanhtoan'])){
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$note = $_POST['note'];
		$address = $_POST['address'];
		$giaohang = $_POST['giaohang'];
		$sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(name,phone,email,address,note,giaohang) values ('$name','$phone','$email','$address','$note','$giaohang')");
		if($sql_khachhang){
			$sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
			$mahang =rand(0,9999);
			$row_khachhang = mysqli_fetch_array($sql_select_khachhang);
			$khachhang_id = $row_khachhang['khachhang_id'];
			for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
				$sanpham_id = $_POST['thanhtoan_product_id'][$i];
				$soluong = $_POST['thanhtoan_soluong'][$i];
				$sql_donhang = mysqli_query($con,"INSERT INTO tbl_donhang(sanpham_id,khachhang_id,soluong,mahang) values ('$sanpham_id','$khachhang_id','$soluong','$mahang')");
				$sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
			}
			
		}
	}
?>
<div class="small-container cart-page">
        <?php
			$sql_lay_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");
		?>
    <form action="" method="post">
        <table>
            <tr>
                <th>Thứ tự</th>
				<th>Sản phẩm</th>
				<th>Số lượng</th>	
				<th>Giá</th>
				<th style="width:200px">Giá tổng</th>
				<th>Tên sản phẩm</th>
				<th>Quản lý</th>
            </tr>
            <?php
				$i = 0;
				$total = 0;
				while($row_fetch_giohang = mysqli_fetch_array($sql_lay_giohang)){
					$subtotal = $row_fetch_giohang['soluong'] * $row_fetch_giohang['giasanpham'];
					$total += $subtotal;
					$i++;
			?>
            <tr>
                <td><?php echo $i ?></td>
				<td>
                    <div class="cart-info">
                        <a href="single.html" class="at-in"><img src="images/<?php echo $row_fetch_giohang['hinhanh'] ?>" class="img-responsive" alt=""></a>
                    </div>
                </td>
				<td class="check">
					<input type="number" min="1" name="soluong[]" value="<?php echo $row_fetch_giohang['soluong'] ?>">
					<input type="hidden" name="product_id[]" value="<?php echo $row_fetch_giohang['sanpham_id'] ?>">
				</td>		
				<td><?php echo number_format($row_fetch_giohang['giasanpham']).'₫'?></td>
				<td><?php echo number_format($subtotal).'₫'?></td>
				<td><?php echo $row_fetch_giohang['tensanpham'] ?></td>
				<td><a style="color: #ff523b;" href="?quanly=giohang&xoa=<?php echo $row_fetch_giohang['giohang_id'] ?>">Xóa</a></td>
            </tr>
            <?php
				}
			?>
            <tr>
                <td style="text-align: center;" colspan="7">Tổng tiền : <?php echo number_format($total).'₫'?></td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="7"><input type="submit" value="Cập nhật giỏ hàng" name="capnhatsoluong"></td>
            </tr>
        </table>
    </form>
        <div class="thongtinkh">
            <form action="" method="post">
				<input type="text" name="name" placeholder="Điền tên">
				<input type="text" name="phone" placeholder="Số phone">
				<input type="text" name="address" placeholder="Địa chỉ">
				<input type="text" name="email" placeholder="Email">
				<textarea style="resize: none;" name="note" placeholder="Ghi chú"></textarea>
				<select name="giaohang">
					<option>Chọn hình thức giao hàng</option>
					<option value="1">Thanh toán ATM</option>
					<option value="0">Nhận tiền tại nhà</option>
				</select>
				<?php
					$sql_lay_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");
					while($row_thanhtoan = mysqli_fetch_array($sql_lay_giohang)){

				?>
					<input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_thanhtoan['soluong'] ?>">
					<input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_thanhtoan['sanpham_id'] ?>">
				<?php
					}
				?>
				<input type="submit" name="thanhtoan" value="Thanh toán">
	        </form>
        </div>
</div>