<?php
	session_start();
	include_once('header.php');
	include_once('../db/connect.php');
?>
<?php
	$login_check = Session::get('customer_login'); 
		if($login_check==false)
		{
		header("Location:login.php");
		}
?>
<?php
		if (!isset($_SESSION["cart"])) {
			$_SESSION["cart"] = array();
		}
		if (isset($_GET['action'])) {
			function update_cart($add = false) {
                foreach ($_POST['quantity'] as $id => $quantity) {
                    if ($quantity == 0) {
                        unset($_SESSION["cart"][$id]);
                    } else {
                        if ($add) {
                            $_SESSION["cart"][$id] += $quantity;
                        } else {
                            $_SESSION["cart"][$id] = $quantity;
                        }
                    }
                }
            }
			switch ($_GET['action']) {
				case "add":
					update_cart(true);
					header('Location: ./giohang.php');
					break;
				case "delete":
					if (isset($_GET['id'])) {
							unset($_SESSION["cart"][$_GET['id']]);
						}
					header('Location: ./giohang.php');
					break;
				case "submit":
						if (isset($_POST['capnhatsoluong'])) { //Cập nhật số lượng sản phẩm
							update_cart();
							header('Location: ./giohang.php');
						}
						elseif($_POST['dathang']){
							if (!empty($_POST['quantity'])) { //Xử lý lưu giỏ hàng vào db
								$products = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_id IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
								$totalto = 0;
								$orderProducts = array();
								while ($row = mysqli_fetch_array($products)) {
									$orderProducts[] = $row;
									$totalto += $row['sanpham_giakhuyenmai'] * $_POST['quantity'][$row['sanpham_id']];
								}
								$khachhang_id = Session:: get ('khachhang_id');
								$sodt = Session:: get ('phone');
								$diachi = Session:: get ('address');
								
								$insertOrder = mysqli_query($con, "INSERT INTO tbl_donhang(kh_id, diachi, sodt, tongtien) VALUES ('$khachhang_id', '$diachi', '$sodt', ' $totalto');");
								$orderID = $con->insert_id;
								$_SESSION['dhid'] = $orderID ;
                            	$insertString = "";
								foreach ($orderProducts as $key => $product) {
									$insertString .= "( '" . $orderID . "', '" . $product['sanpham_id'] . "', '" . $_POST['quantity'][$product['sanpham_id']] . "', '" . $product['sanpham_gia'] . "', '" . $product['sanpham_name'] . "')";
									if ($key != count($orderProducts) - 1) {
										$insertString .= ",";
									}
								}
								// var_dump($insertString);
								// exit;
								$insertOrder = mysqli_query($con, "INSERT INTO tbl_chitietdonhang(donhang_id, sanpham_id, soluong, gia,sanpham_name) VALUES " . $insertString . ";");
								// $success = "Đặt hàng thành công";
								$sql_slsp = mysqli_query($con,"SELECT * FROM tbl_sanpham,tbl_giohang WHERE tbl_sanpham.sanpham_id=tbl_giohang.sanpham_id AND tbl_sanpham.sanpham_id= " . implode(",", array_keys($_POST['quantity'])) . " GROUP BY tbl_giohang.giohang_id ORDER BY tbl_giohang.giohang_id DESC");
								$row_soluongsp = mysqli_fetch_array($sql_slsp);
								$soluongtblsp = $row_soluongsp['sanpham_soluong'];
								// $sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
								$soluongsp = $soluongtblsp - $_POST['quantity'][$product['sanpham_id']];
								echo $soluongsp;
								$sql_insertsl = mysqli_query($con,"UPDATE tbl_sanpham SET sanpham_soluong = '$soluongsp' WHERE sanpham_id = " . implode(",", array_keys($_POST['quantity'])) . ";");
								echo "<script>window.location.href='indexpm.php?khachhang_id=$khachhang_id'</script>";
								unset($_SESSION['cart']);
							}
						}
						break;
			}
		}
		if (!empty($_SESSION["cart"])) {
            $products = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_id IN (".implode(",", array_keys($_SESSION["cart"])).")");
			// var_dump($products);exit;
        }


?>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Trang chủ
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<span class="stext-109 cl4">
				Giỏ hàng
			</span>
		</div>
	</div>
	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" action="giohang.php?action=submit" method="POST" >
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Sản phẩm</th>
									<th class="column-2"></th>
									<th class="column-3">Giá</th>
									<th class="column-4">Số lượng</th>
									<th class="column-5">Tổng tiền</th>
									<th class="column-5">Quản lý</th>
								</tr>
								<?php 
								if (!empty($products)) {
                            		$total = 0;
									while ($row = mysqli_fetch_array($products)) { 	
										
								?>
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="../uploads/<?php echo $row['sanpham_image'] ?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $row['sanpham_name'] ?>2</td>
									<td class="column-3"><?php echo number_format($row['sanpham_giakhuyenmai'], 0, ",", "."); ?></td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="text" name="quantity[<?php echo $row['sanpham_id'] ?>]" value="<?php echo $_SESSION["cart"][$row['sanpham_id']] ?>">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5"><?php echo number_format($row['sanpham_giakhuyenmai'] * $_SESSION["cart"][$row['sanpham_id']], 0, ",", ".");?></td>
									<td><a style="color: #ff523b;" href="giohang.php?action=delete&id=<?php echo $row['sanpham_id'] ?>">Xóa</a></td>
								</tr>
								<?php
								$total += $row['sanpham_giakhuyenmai'] * $_SESSION["cart"][$row['sanpham_id']];
							}}
								?>
							</table>
						</div>
						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
						<input class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" type="submit" value="Cập nhật giỏ hàng" name="capnhatsoluong">
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					
						<h4 class="mtext-109 cl2 p-b-30">
							Tổng giỏ hàng của bạn
						</h4>
						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>
							<?php	if (!empty($products)) {?>
							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<?php echo number_format($total, 0, ",", ".").' đ';?>
								</span>
							</div>
							<?php }?>
						</div>
						<input  class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" value="Tiến hành thanh toán" name="dathang" type="submit">
						
					</div>
				</div>
			</div>
		</div>
	</form>
		

	<!-- Footer -->
<?php
	include_once('footer.php');
?>



	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="../vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>