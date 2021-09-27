<?php
	session_start();
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Xstore</title>
</head>
<body>
    <?php
		include('include/topbar.php');
		// include('include/slider.php');
		
		if(isset($_GET['quanly'])){
			$tam = $_GET['quanly'];
		}else{
			$tam = '';
		}

		if($tam=='danhmuc'){
			include('include/danhmuc.php');
		}
		elseif($tam=='chitiet'){
			include('include/chitietsp.php');
		}
		elseif($tam=='giohang'){
			include('include/giohang.php');
		}
		elseif($tam=='login'){
			include('include/login.php');
		}
		elseif($tam='home'){
			include('include/home.php');
		}

		include('include/footer.php');
	?>


    <script type="text/javascript">
        var counter = 1;
        setInterval(function(){
            document.getElementById('radio' + counter).checked = true;
            counter ++;
            if(counter > 4){
                counter = 1;
            }
        }, 3000);
    </script>
</body>

</html>