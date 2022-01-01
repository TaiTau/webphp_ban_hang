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
            <div class="col-lg-12">
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
                        <th>
                          Mô tả
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
                          <input type="text" value="" name="sanpham_soluong">
                          </td>
                          <td>
                          <input type="text" value="" name="sanpham_hot">
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
                          <td>
                            <textarea style="resize: none;" name="sanpham_mota2"></textarea>
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