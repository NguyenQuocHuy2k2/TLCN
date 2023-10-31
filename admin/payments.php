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
                    <h1>Payments</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Payments</li>
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
                <h3 class="card-title">Payments</h3>

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
                            <th style="width: 15%" class="text-center">
                                Order_id
                            </th>
                            <th style="width: 15%" class="text-center">
                                Total cost
                            </th>
                            <th style="width: 15%" class="text-center">
                                Bank code
                            </th>
                            <th style="width: 15%" class="text-center">
                                Payment content
                            </th>
                            <th style="width: 15%" class="text-center">
                                Payment method
                            </th>
                            <th style="width: 15%" class="text-center">
                                Payment Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $getAllPayment = $payment->getAllPayments();
                        foreach ($getAllPayment as $value) :
                        ?>
                            <tr>
                                <td class="text-center" style="width: 15%"><?php echo $value['order_id'] ?></td>
                                <td class="text-center" style="width: 15%"><?php echo number_format($value['total_cost'],0,',','.')?>đ</td>
                                <td class="text-center" style="width: 15%"><?php echo $value['bankcode'] ?></td>
                                <td class="text-center" style="width: 15%"><?php echo $value['content'] ?></td>
                                <td class="text-center" style="width: 15%"><?php echo $value['card_type'] ?></td>
                                <td class="text-center" style="width: 15%"><?php echo $value['status'] ?></td>     
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "footer.php" ?>