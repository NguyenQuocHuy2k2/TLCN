<?php include "header.php";
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'sc') {
        echo "<script> alert('Xóa thành công'); </script>";
    }
    if ($_GET['status'] == 'sf') {
        echo "<script> alert('Xóa không thành công'); </script>";
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
                    <h1>Coupons</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Coupons</li>
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
                <h3 class="card-title">Coupons</h3>

                <div class="card-tools">
                    <a class="btn  btn-sm bg-green" href="addCoupon.php">
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
                            <th style="width: 11%" class="text-center">
                                Coupon_id
                            </th>
                            <th style="width: 11%" class="text-center">
                                Coupon code
                            </th>
                            <th style="width: 11%" class="text-center">
                                Coupon type
                            </th>
                            <th style="width: 15%" class="text-center">
                                Coupon discount
                            </th>
                            <th style="width: 11%" class="text-center">
                                Min order
                            </th>
                            <th style="width: 5%" class="text-center">
                                Quantity
                            </th>
                            <th style="width: 5%" class="text-center">
                                Used
                            </th>
                            <th style="width: 5%" class="text-center">
                                Remain
                            </th>
                            <th style="width: 13%" class="text-center">
                                Expired date
                            </th>
                            <th style="width: 5%" class="text-center">
                                
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $getCoupon = $coupon->getCoupon();
                        $getCouponType = $coupon->getCouponTypeName();
                        foreach ($getCoupon as $value) :
                            foreach ($getCouponType as $coupontype) :
                                if ($value['coupon_type'] == $coupontype['coupon_type']) :
                        ?>
                            <tr>
                                <td class="text-center" style="width: 11%"><?php echo $value['coupon_id'] ?></td>
                                <td class="text-center" style="width: 11%"><?php echo $value['coupon_code'] ?></td>
                                <td class="text-center" style="width: 11%"><?php echo $coupontype['type_name'] ?></td>
                                <td class="text-center" style="width: 15%"><?php echo number_format($value['coupon_amount'],0,',','.')?></td>
                                <td class="text-center" style="width: 11%"><?php echo number_format($value['min_order'],0,',','.') ?>đ</td>
                                <td class="text-center" style="width: 5%"><?php echo $value['coupon_quantity'] ?></td>
                                <td class="text-center" style="width: 5%"><?php echo $value['coupon_used'] ?></td>
                                <td class="text-center" style="width: 5%"><?php echo $value['coupon_remain'] ?></td>
                                <td class="text-center" style="width: 13%"><?php echo date('d/m/Y', strtotime($value['coupon_expired'])) ?></td>
                                <td class="text-center" style="width: 5%">
                                    <a class="btn btn-info btn-sm" href="editCoupon.php?coupon_id=<?php echo $value['coupon_id']; ?>">
                                        <i class="fas fa-pencil-alt"></i>
                                        Update
                                    </a>
                                    <a class="btn btn-danger btn-sm" style="margin-top:7px;" href="deleteCP.php?coupon_id=<?php echo $value['coupon_id']; ?>">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </a>
                            </td>
                            </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
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