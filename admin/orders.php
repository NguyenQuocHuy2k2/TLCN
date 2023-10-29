<?php include "header.php";
if (isset($_GET['status'])) {
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
                    <h1>Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
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
                <h3 class="card-title">Orders</h3>

                <div class="card-tools">
       
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
                            <th style="width: 5%">
                                Order_id
                            </th>
                            <th style="width: 5%">
                                User_id
                            </th>
                            <th style="width: 25%" class="text-center">
                                Address
                            </th>
                            <th style="width: 10%">
                                Phone
                            </th>
                            <th style="width: 5%">
                                Total
                            </th>
                            <th style="width: 10%" class="text-center">
                                Note
                            </th>
                            <th style="width: 10%" class="text-center">
                                Checkout
                            </th>
                            <th style="width: 10%" class="text-center">
                                Status
                            </th>
                            <th style="width: 10%">
                                Date_create
                            </th>
                            <th style="width: 10%" class="text-center">
                                Details
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $getAllOrdersDESC = $order->getAllOrdersDESC();
                            foreach($getAllOrdersDESC as $orderInfo){
                                $order_id = $orderInfo['order_id'];
                            }
                            
                            $perPage = 10;
                            // Lấy số trang trên thanh địa chỉ
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            // Tính tổng số dòng, ví dụ kết quả là 18
                            $total = count($getAllOrdersDESC);
                            // lấy đường dẫn đến file hiện hành
                            $url = $_SERVER['PHP_SELF'] . "?order_id=" . $order_id;                        
                            $getAllOrderDetail = $orderdetail->getAllOrderDetails();
                            $get10OrdersDESCs = $order->get10OrdersDESC($page,$perPage);
                        foreach ($get10OrdersDESCs as $value) :
                        ?>
                            <tr>
                                <td class="text-center" style="width: 5%"><?php echo $value['order_id'] ?></td>
                                <td class="text-center" style="width: 5%"><?php echo $value['user_id'] ?></td>
                                <td class="text-center" style="width: 20%"><?php echo $value['address'] ?></td>
                                <td style="width: 10%"><?php echo $value['phone']?></td>
                                <td style="width: 5%"><?php echo number_format($value['total'],0,',','.')?>đ</td>
                                <td style="width: 10%"><?php echo $value['note'] ?></td>
                                <td style="width: 10%"><?php if($value['checkout'] == 0) { echo 'Chuyển khoản ngân hàng';} else { echo 'Thanh toán khi nhận hàng';} ?></td>
                                <td class="text-center" style="width: 10%">
                                <?php 
                                    $statusInfo = $status->getAllStatus();
                                    foreach($statusInfo as $value1){
                                        if($value1['status'] == $value['status']){
                                            echo $value1['status_name'];
                                        }
                                    }
                                ?></td>
                                <td style="width: 10%"><?php echo $value['date_create'] ?></td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-sm bg-green" href="orderdetail.php?order_id=<?php echo $value['order_id']; ?>">
                                        <i class="fa fa-eye" >
                                        </i>
                                            View
                                    </a>
                                    <a class="btn btn-sm btn-info" style="margin-top:8px" href="editOrderStatus.php?order_id=<?php echo $value['order_id']; ?>">
                                        <i class="fas fa-pencil-alt" >
                                        </i>
                                            Status
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