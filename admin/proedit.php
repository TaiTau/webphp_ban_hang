<?php
  include '../include/header_admin.php';
  include '../include/sidebar_admin.php';
  include '../classes/product.php';
?>
<?php
 $pro = new productadd();
if (!isset($_GET['sanpham_id']) || $_GET['sanpham_id'] ==NULL){
echo "<script>window.location ='DSSP.php'</script>";
}

else
{
    $id = $_GET['sanpham_id'];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    
    $updateProduct = $pro->update_pro($_POST,$_FILES, $id);
    
}

?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Sửa thông tin sản phẩm</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <?php
                if(isset($updateProduct)){
                  echo $updateProduct;
                }
                  ?>
                  <?php
                    $getproname = $pro->getprobyid($id);
                    if($getproname){
                    while($result = $getproname->fetch_assoc()){
                    
                  ?>
                  <form action="" method="post" enctype="multipart/form-data">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Tên
                        </th>
                        <th>
                          ID danh mục
                        </th>
                        <th>
                          Ảnh
                        </th>
                        <th>
                          Số lượng
                        </th>
                        <th>
                          Sản phẩm hot
                        </th>
                        <th>
                          Giá
                        </th>
                        <th>
                      Giá khuyến mãi
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <input type="text" value="<?php echo $result['sanpham_name']?>" name="sanpham_name">
                          </td>
                          <td>
                          <input type="text" value="<?php echo $result['category_id']?>" name="category_id">
                          </td>
                          <td>
                          <img src="../uploads/<?php echo  $result['sanpham_image']; ?>" width="50">
                          <input type="file" name="sanpham_image" />
                          </td>
                          <td>
                          <input type="text" value="<?php echo $result['sanpham_soluong']?>" name="sanpham_soluong">
                          </td>
                          <td>
                          <input type="text" value="<?php echo $result['sanpham_hot']?>" name="sanpham_hot">
                          </td>
                          <td>
                          <input type="text" value="<?php echo $result['sanpham_gia']?>" name="sanpham_gia"> 
                          </td>
                          <td >
                          <input type="text" value="<?php echo $result['sanpham_giakhuyenmai']?>" name="sanpham_giakhuyenmai"> 
                          </td>
                          
                        </tr>
                        
                      </tbody>
                      
                    </table>
                    
            <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
            
                 
                  </form>
                  <?php
                    }}
                  ?>
                  
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <?php
  include '../include/footer_admin.php';
?>