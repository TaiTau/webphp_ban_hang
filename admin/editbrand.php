<?php
  include '../include/header_admin.php';
  include '../include/sidebar_admin.php';
  include '../classes/brand.php';
?>
<?php
 $brand = new brandadd();
if (!isset($_GET['category_id']) || $_GET['category_id'] ==NULL){
echo "<script>window.location ='qlth.php'</script>";
}

else
{
    $id = $_GET['category_id'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $brandname = $_POST['brandname'];
    $updatebrand =$brand->update_brand($brandname,$id);
}


?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Sửa thông tin danh mục</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <?php
                    $getbrandname = $brand->getbrandbyid($id);
                    if($getbrandname){
                    while($result = $getbrandname->fetch_assoc()){
                    
                  ?>
                  <form action="" method="post">
                    <table class="table">
                      <thead class=" text-primary">
                        
                        <th>
                          Tên danh mục
                        </th>
                       
                        
                      </thead>
                      <tbody>
                        <tr>
                          
                          <td>
                          <input type="text" value="<?php echo $result['category_name']?>" name="brandname">
                          </td>
                          <td>
                        
                          
                        </tr>
                        
                      </tbody>
                      
                    </table>
                    
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            
                 
                  </form>
                  <?php
                    }}
                  ?>
                  <?php
                if(isset($update_brand)){
                  echo $update_brand;
                }
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