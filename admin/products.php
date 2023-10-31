<?php include "header.php";
if (isset($_GET['status'])) {
  if ($_GET['status'] == 'df') {
    echo "<script> alert('Xóa không thành công'); </script>";
  }
  if ($_GET['status'] == 'dc') {
    echo "<script> alert('Xóa thành công'); </script>";
  }
  if ($_GET['status'] == 'ec') {
    echo "<script> alert('Sửa thành công'); </script>";
  }
  if ($_GET['status'] == 'ef') {
    echo "<script> alert('Sửa không thành công'); </script>";
  }
  if ($_GET['status'] == 'ac') {
    echo "<script> alert('Thêm thành công'); </script>";
  }
  if ($_GET['status'] == 'af') {
    echo "<script> alert('Thêm không thành công'); </script>";
  }
}
echo '<script>window.history.pushState({}, document.title, "/" + "/admin/products.php");</script>';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Products</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Products</h3>

        <div class="card-tools">
          <a class="btn  btn-sm bg-green" href="addProduct.php">
            <i class="fas fa-plus"></i>
            Add
          </a>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">
                Product_id
              </th>
              <th style="width: 15%">
                Name
              </th>
              <th style="width: 5%">
                Image
              </th>
              <th style="width: 25%">
                Description
              </th>
              <th style="width: 8%">
                Price
              </th>
              <th style="width: 8%">
                Discount price
              </th>
              <th style="width: 3%">
                Manufactures
              </th>
              <th style="width: 6%">
                Protype
              </th>
              <th style="width: 3%">
                Feature
              </th>
              <th style="width: 8%">
                Created_at
              </th>
              <th style="width: 5%" class="text-center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $getAllProductsDESC = $product->getAllProductsDESC();

            foreach($getAllProductsDESC as $productInfo){
                $pro_id = $productInfo['id'];
            }
            
            $perPage = 10;
            // Lấy số trang trên thanh địa chỉ
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            // Tính tổng số dòng, ví dụ kết quả là 18
            $total = count($getAllProductsDESC);
            // lấy đường dẫn đến file hiện hành
            $url = $_SERVER['PHP_SELF'] . "?id=" . $pro_id;                        
            $get10ProductsDESCs = $product->get10ProductsDESC($page,$perPage);
            foreach ($get10ProductsDESCs as $value) :
            ?>
              <tr>
                <td style="text-align:center"><?php echo $value['id'] ?></td>
                <td><?php echo $value['name'] ?></td>
                <td><img style="width:50px" src="../img/<?php echo $value['pro_image'] ?>" alt=""></td>
                <td class="project_progress">
                  <?php
                  if (strlen($value['description']) > 120) : ?>
                    <?php echo substr($value['description'], 0, 120) ?><a style="color: black;" href="detailProducts.php?id=<?php echo $value['id'] ?>">...</a>
                    <?php else: echo $value['description'] ?>
                  <?php endif ?>

                </td>
                <td><?php echo number_format($value['price']) ?>đ</td>
                <td><?php echo number_format($value['discount_price']) ?>đ</td>
                <td class="project_progress">
                  <?php echo $value['manu_name'] ?>
                </td>
                <td class="project-state">
                  <?php echo $value['type_name'] ?>
                </td>
                <td class="project-state">
                  <?php if ($value['feature'] == '1') {
                    echo 'Nổi bật';
                  } else {
                    echo 'Không nổi bật';
                  } ?>
                </td>
                <td class="project-state">
                  <?php echo $value['created_at'] ?>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" style="margin-bottom: 10px;" href="editPropduct.php?id=<?php echo $value['id']; ?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Update
                  </a>
                  <a class="btn btn-danger btn-sm" href="deletePD.php?id=<?php echo $value['id']; ?>">
                    <i class="fas fa-trash">
                    </i>
                    Delete
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <div class="store-filter clearfix">
            <ul class="store-pagination" style="text-align: center; list-style: none; padding: 0; display: flex; flex-direction: row; justify-content: center;">
                <?php echo $order->paginate($url, $total, $perPage, $page); ?>
            </ul>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "footer.php" ?>