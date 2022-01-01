<?php
  include '../include/header_admin.php';
  include '../include/sidebar_admin.php';
  include '../classes/tintuc.php';
?>
<?php
 $pro = new tintuc();
if (!isset($_GET['id']) || $_GET['id'] ==NULL){
echo "<script>window.location ='DSSP.php'</script>";
}

else
{
    $id = $_GET['id'];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    
    $updateProduct = $pro->update_tintuc($_POST,$_FILES, $id);
    
}

?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Sửa thông tin tin tức</h4>
                  
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
                        Hình ảnh
                        </th>
                        <th>
                         Danh mục
                        </th>
                        <th>
                         Tiêu đề
                        </th>
                        <th>
                         Tóm tắt
                        </th>
                        <th>
                         Tác giả
                        </th>
                        <th>
                          Nội dung
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                          <img src="../uploads/<?php echo  $result['hinhanh']; ?>" width="50">
                          <input type="file" name="hinhanh" />
                          </td>
                          <td>
                          <input type="text" value="<?php echo $result['danhmuc']?>" name="danhmuc">
                          </td>
                          <td>
                          <input type="text" value="<?php echo $result['tieude']?>" name="tieude">
                          </td>
                          <td>
                          <input type="text" value="<?php echo $result['tomtat']?>" name="tomtat">
                          </td>
                          <td>
                          <input type="text" value="<?php echo $result['tacgia']?>" name="tacgia">
                          </td>
                          <td>
                          <input type="text" value="<?php echo $result['noidung']?>" name="noidung">
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
          </div>
        </div>
      </div>

    </div>
  </div>
  <?php
  include '../include/footer_admin.php';
?>