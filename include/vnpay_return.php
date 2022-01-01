<?php
    include_once('../db/connect.php');
    include '../classes/dhadd.php';
    ob_start();
    session_start();
    $order = new order;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Thông tin thanh toán</title>
        <!-- Bootstrap core CSS -->
        <link href="assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="assets/jumbotron-narrow.css" rel="stylesheet">         
        <script src="assets/jquery-1.11.3.min.js"></script>
        <style>
        body{margin-top:20px;
background-color: #f7f7ff;
}
#invoice {
    padding: 0px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #0d6efd
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #0d6efd
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #0d6efd;
    background: #e7f2ff;
    padding: 10px;
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,
.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #0d6efd;
    font-size: 1.2em
}

.invoice table .qty,
.invoice table .total,
.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #0d6efd
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #0d6efd;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0px solid rgba(0, 0, 0, 0);
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}

.invoice table tfoot tr:last-child td {
    color: #0d6efd;
    font-size: 1.4em;
    border-top: 1px solid #0d6efd
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px !important;
        overflow: hidden !important
    }
    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }
    .invoice>div:last-child {
        page-break-before: always
    }
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #0d6efd;
    background: #e7f2ff;
    padding: 10px;
}</style>
    </head>
    <body>
        <?php
        require_once("./config.php");
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        unset($inputData['vnp_SecureHashType']);
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . $key . "=" . $value;
            } else {
                $hashData = $hashData . $key . "=" . $value;
                $i = 1;
            }
        }

        //$secureHash = md5($vnp_HashSecret . $hashData);
		$secureHash = hash('sha256',$vnp_HashSecret . $hashData);
        ?>
        <!--Begin display -->
        <?php
            $id  = $_SESSION['khachhang_id'];
           
            $sql_infor_cus = mysqli_query($con, "SELECT * FROM tbl_khachhang WHERE khachhang_id = '$id' ") ;
            $inf_kh = mysqli_fetch_array($sql_infor_cus);
            $hd=$_SESSION['dhid'];
            $sql_kq1 = mysqli_query($con,"SELECT * FROM tbl_chitietdonhang WHERE tbl_chitietdonhang.donhang_id='$hd' ");
            $row_khachhang1 = mysqli_fetch_array($sql_kq1);
            
        ?>
        <div class="container">
    <div class="card">
        <div class="card-body">
            <div id="invoice">
                <!-- <div class="toolbar hidden-print">
                    <div class="text-end">
                        <button type="button" class="btn btn-dark"><i class="fa fa-print"></i> Print</button>
                        <button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                    </div>
                    <hr>
                </div> -->
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <!-- <header>
                            <div class="row">
                                <div class="col">
                                    <a href="javascript:;">
    												<img src="assets/images/logo-icon.png" width="80" alt="">
												</a>
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
                                        <a target="_blank" href="javascript:;">
									Arboshiki
									</a>
                                    </h2>
                                    <div>455 Foggy Heights, AZ 85004, US</div>
                                    <div>(123) 456-789</div>
                                    <div>company@example.com</div>
                                </div>
                            </div>
                        </header> -->
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <!-- <div class="text-gray-light">Hóa Đơn</div> -->
                                    <h1 class="invoice-id" style="text-align: center;">HÓA ĐƠN</h1>
                                    <!-- <h2 class="to">John Doe</h2>
                                    <div class="address">796 Silver Harbour, TX 79273, US</div>
                                    <div class="email"><a href="mailto:john@example.com">john@example.com</a>
                                    </div> -->
                                </div>
                                <div class="col invoice-details" style="text-align: left; font-size:20px; margin-left:20px">
                                    <!-- <h1 class="invoice-id">Khách hàng:<?php echo $inf_kh['name']?></h1> -->
                                    <div class="text-gray-light">Khách hàng: <?php echo $inf_kh['name']?></div>
                                    <div class="date">Ngày: <?php echo $row_khachhang1['ngaydat'] ?></div>
                                    <div class="date">Điện thoại: <?php echo $inf_kh['phone']?></div>
                                    <div class="date">Địa chỉ: <?php echo $inf_kh['address']?></div>
                                </div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th class="text-left">Sản phẩm</th>
                                        <th class="text-right">Giá</th>
                                        <th class="text-right">Số lượng</th>
                                        <th class="text-right">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                               <?php 
                            
                            $sql_kq = mysqli_query($con,"SELECT * FROM tbl_chitietdonhang WHERE tbl_chitietdonhang.donhang_id='$hd' ");
                            $num=1;
                            while($row_khachhang = mysqli_fetch_array($sql_kq)){
                            
                                    ?>
                                    
                                   
                                    <tr>
                                        <td class="no"><?php echo '0'.$num?></td>
                                        <td class="text-left">
                                            <h3>
                                                <?php echo $row_khachhang['sanpham_name'] ?>
                                            </h3>
                                            <!-- <a target="_blank" href="javascript:;">
										   Useful videos
									   </a> to improve your Javascript skills. Subscribe and stay tuned :)</td> -->
                                        <td class="unit"><?php echo number_format($row_khachhang['gia'], 0, ",", ".").'đ'; ?></td>
                                        <td class="qty"><?php echo $row_khachhang['soluong'] ?></td>
                                        <td class="total"><?php  echo number_format($row_khachhang['soluong'] *  $row_khachhang['gia'], 0, ",", ".").'đ'; ?> </td>
                                    </tr>
                                    <?php
                                    $num++;
                            }
                                    ?>
                                    <!-- <tr>
                                        <td class="no">01</td>
                                        <td class="text-left">
                                            <h3>Website Design</h3>Creating a recognizable design solution based on the company's existing visual identity</td>
                                        <td class="unit">$40.00</td>
                                        <td class="qty">30</td>
                                        <td class="total">$1,200.00</td>
                                    </tr>
                                    <tr>
                                        <td class="no">02</td>
                                        <td class="text-left">
                                            <h3>Website Development</h3>Developing a Content Management System-based Website</td>
                                        <td class="unit">$40.00</td>
                                        <td class="qty">80</td>
                                        <td class="total">$3,200.00</td>
                                    </tr>
                                    <tr>
                                        <td class="no">03</td>
                                        <td class="text-left">
                                            <h3>Search Engines Optimization</h3>Optimize the site for search engines (SEO)</td>
                                        <td class="unit">$40.00</td>
                                        <td class="qty">20</td>
                                        <td class="total">$800.00</td>
                                    </tr> -->
                                </tbody>
                                <tfoot>
                                    <!-- <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">SUBTOTAL</td>
                                        <td>$5,200.00</td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">TAX 25%</td>
                                        <td>$1,300.00</td>
                                    </tr> -->
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">Tổng tiền:</td>
                                        <td><?=number_format($_GET['vnp_Amount']/100) ?> đ</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <br>
                            <br>

                            <div class="thanks">Cảm ơn quý khách!</div>
                            <!-- <div class="notices">
                                <div>NOTICE:</div>
                                <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                            </div> -->
                        </main>
                        <!-- <footer>Invoice was created on a computer and is valid without the signature and seal.</footer> -->
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="container">
            <!-- <div class="header clearfix">
                <h3 class="text-muted">Thông tin đơn hàng</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>
                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>    
                <div class="form-group">
                    <label >Tên khách hàng:</label>
                    <label><?php echo $inf_kh['name']?></label>
                </div>
                <div class="form-group">
                    <label >Địa chỉ:</label>
                    <label><?php echo $inf_kh['address']?></label>
                </div>
                <div class="form-group">
                    <label >Số điện thoại:</label>
                    <label><?php echo $inf_kh['phone']?></label>
                </div>
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label><?=number_format($_GET['vnp_Amount']/100) ?> VNĐ</label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                $order_id = $_GET['vnp_TxnRef'];
                                $money = $_GET['vnp_Amount']/100;
                                $note = $_GET['vnp_OrderInfo'];
                                $vnp_response_code = $_GET['vnp_ResponseCode'];
                                $code_vnpay = $_GET['vnp_TransactionNo'];
                                $code_bank = $_GET['vnp_BankCode'];
                                $time = $_GET['vnp_PayDate'];
                                $date_time = substr($time, 0, 4) . '-' . substr($time, 4, 2) . '-' . substr($time, 6, 2) . ' ' . substr($time, 8, 2) . ' ' . substr($time, 10, 2) . ' ' . substr($time, 12, 2);

                                
                                
                                echo "GD Thanh cong";
                            } else {
                                echo "GD Khong thanh cong";
                            }
                        } else {
                            echo "Chu ky khong hop le";
                        }
                        ?>

                    </label> -->
                    <br>
                    <a href="http://localhost/xstore5/">
                        <button>Quay lại</button>
                    </a>
                </div> 
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                <p>&copy; COZA Store 2021</p>
            </footer>
        </div>  
    </body>
</html>
