<?php
  include '../include/header_admin.php';
  include '../include/sidebar_admin.php';
  include '../classes/category.php';
  include_once '../classes/tintuc.php';
?>


<?php
	$product = new tintuc();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
    {
        $insertProduct = $product->insert_tt($_POST,$_FILES);
    }
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Thêm tin tức</h4>
                  <?php
                if(isset($insertProduct)){
                  echo $insertProduct;
                }
                  ?>
                </div>
                
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        
                        <th>
                          Danh mục
                        </th>
                        <th>
                          Tiêu đề
                        </th>
                        <th>
                          Hình ảnh
                        </th>
                        <th>
                          Tác giả
                        </th>
                        <th>
                          Tóm tắt
                        </th>
                        <th>
                          Nội dung
                        </th>
                      </thead>
                      <tbody>
                      <form method="post" action="themtt.php" enctype="multipart/form-data">
                        <tr>
                          <td>
                            <input type="text" value="" name="danhmuc">
                          </td>
                          <td>
                            <input type="text" value="" name="tieude">
                          </td>
                          <td>
                          <input type="file" value="" name="hinhanh">
                          </td>
                          <td>
                          <input type="text" value="" name="tacgia">
                          </td>
                          <td>
                          <input type="text" value="" name="tomtat">
                          </td>
                          <td>
                          <input type="text" value="" name="noidung">  
                          </td>
                        </tr>
                        <tr>
                          <td>

                          <button type="submit" name="submit"  class="btn btn-primary">Thêm</button>
                          
                          </td>
                        </tr>
                        </form>
                      </tbody>
                      
                    </table>
                    
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