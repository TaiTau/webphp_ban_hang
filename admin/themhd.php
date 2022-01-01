<?php
  include '../include/header_admin.php';
  include '../include/sidebar_admin.php';
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Thêm đơn hàng</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Ngày đặt
                        </th>
                        <th>
                         Sản phẩm
                        </th>
                        <th>
                          Số Lượng
                        </th>
                        <th>
                         ID khách hàng
                        </th>
                        <th>
                        Giá
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <input type="text" value="">
                          </td>
                          <td>
                          <input type="text" value="">
                          </td>
                          <td>
                          <input type="text" value="">
                          </td>
                          <td>
                          <input type="text" value=""> 
                          </td>
                          <td class="text-primary">
                          <input type="text" value=""> 
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
            <button type="button" class="btn btn-primary">Thêm</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <?php
 include '../include/footer_admin.php';
?>