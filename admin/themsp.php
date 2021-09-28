<?php
  include '../include/header_admin.php';
  include '../include/sidebar_admin.php';
  include '../classes/category.php';
  include_once '../classes/product.php';
?>


<?php
	$product = new productadd();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
    {
        $insertProduct = $product->insert_product($_POST,$_FILES);
    }
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Thêm sản phẩm</h4>
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
                          Tên
                        </th>
                        <th>
                          Id danh mục
                        </th>
                        <th>
                          Ảnh
                        </th>
                        <th>
                        Giá
                        </th>
                        <th>
                          Giá km
                        </th>
                        <th>
                          Mô tả
                        </th>
                      </thead>
                      <tbody>
                      <form method="post" action="themsp.php" enctype="multipart/form-data">
                        <tr>
                          <td>
                            <input type="text" value="" name="sanpham_name">
                          </td>
                          <td>
                          <input type="text" value="" name="category_id">
                          </td>
                          <td>
                          <input type="file" value="" name="sanpham_image">
                          </td>
                          <td>
                          <input type="text" value="" name="sanpham_gia">  
                          </td>
                          <td class="text-primary">
                          <input type="text" value="" name="sanpham_giakm"> 
                          </td>
                          <td>
                            <textarea style="resize: none;" name="sanpham_mota"></textarea>
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