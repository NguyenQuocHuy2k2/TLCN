<?php
session_start();
if (isset($_SESSION['couponCode'])) {
	$couponCode = $_SESSION['couponCode'];

} else {
	$couponCode = '';
}
include "headeruser.php";
$coupons = $coupon->getCouponAmountByName($couponCode);
foreach ($coupons as $couponValues) {
	if ($couponCode === $couponValues['coupon_code']) {
		$coupon_name = $couponValues['coupon_code'];
		$coupon_amount = $couponValues['coupon_amount'];
		$coupon_type = $couponValues['coupon_type'];
		$coupon_quantity = $couponValues['coupon_quantity'];
		$coupon_used = $couponValues['coupon_used'];
		$coupon_remain = $couponValues['coupon_remain'];
	}
}
$_SESSION['coupon_code'] = $coupon_name;
$_SESSION['coupon_quantity'] = $coupon_quantity;
$_SESSION['coupon_used'] = $coupon_used;
$_SESSION['coupon_remain'] = $coupon_remain;
unset($_SESSION['couponCode']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Capple - Website bán đồ ăn, trái cây , rau củ trực tuyến</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

</head>

<body>
	<div class="section">
		<div class="container">
			<div class="row">
				<form
					action="addreorderdetail.php?ids=<?php echo $ids = isset($_GET['ids']) ? $_GET['ids'] : '' ?>&order_id=<?php echo $order_id = isset($_GET['order_id']) ? $_GET['order_id'] : '' ?>"
					method="post">
					<div>
						<h2 class="title" style="border-radius:6px; margin-left:15px">Thanh toán</h2>
					</div>
					<div class="col-md-6">
						<div class="billing-details" style="border-top: 1px solid #ccc">
							<div class="section-title">
								<h3 class="title" style="border-radius:6px;">Thông tin người nhận</h3>
							</div>
							<?php if (isset($_SESSION['user'])):
								$getInfoByUsername = $user->getInfoByUsername($_SESSION['user']);
								foreach ($getInfoByUsername as $value):
									?>
									<div class="form-group">
										<h5>Họ & tên*</h5>
										<input class="input" type="text" name="full name" placeholder="Full Name"
											value="<?php echo $value['First_name'] . $value['Last_name'] ?>" readonly>
									</div>
									<h5>Địa chỉ nhận hàng*</h5>
									<div class="form-group">
										<input class="input" type="text" name="address" placeholder="Địa chỉ nhận hàng"
											required>
									</div>
									<h5>Số điện thoại*</h5>
									<div class="form-group">
										<input class="input" type="tel" name="phone" placeholder="Điện thoại" required>
									</div>
								<?php endforeach ?>

							<?php endif ?>

						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="order-notes">
									<h5>Ghi chú</h5>
									<textarea style="height: 115px; width: 555px" class="input"
										placeholder="Thông điệp bánh ngọt ví dụ: 'Chúc mừng sinh nhật'"
										name="note"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row-md-5 order-details">
							<div class="section-title text-center">
								<h3 class="title" style="border-radius:6px;">Đơn hàng của bạn</h3>
							</div>
							<div class="order-summary">
								<div class="order-products">
									<?php
									$ids = isset($_GET['ids']) ? $_GET['ids'] : '';
									$idArray = explode(',', $ids);
									$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : '';
									$orderDetails = $orderdetail->getAllOrderDetailsByOrderId($order_id);
									$temp_cost = 0;
									foreach ($orderDetails as $orderDetail) {
										foreach ($idArray as $id) {
											if ($id == $orderDetail['product_id']) {
												$cash = $orderDetail['discount_price'] * $orderDetail['product_quantity'];
												$temp_cost += $cash;
												$_SESSION['total_cost'] = $temp_cost;
												?>
												<div class="order-col">
													<h5><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail"
															src="img/<?php echo $orderDetail['product_image']; ?>"> x
														<?php echo $orderDetail['product_quantity']; ?>
													</h5>
													<div style="width:60%">
														<strong>
															<?php echo $orderDetail['product_name']; ?>
															<div></div>
															<?php echo number_format($orderDetail['discount_price'], 0, ',', '.'); ?>
															đ
														</strong>
													</div>
												</div>
												<div class="order-col">
													<div>
														<strong>Tạm tính:</strong>
													</div>
													<div>
														<strong class="order-cash-total">
															<?php echo number_format($cash, 0, ',', '.'); ?> đ
														</strong>
													</div>
												</div>
												<hr style="border-color: #ccc">
												<?php
											}
										}
									}
									?>

									<div class="order-col">
										<div>
											<strong>Tiền hàng:</strong>
										</div>
										<div>
											<strong class="order-cash-total">
												<?php echo number_format($temp_cost, 0, ',', '.'); ?> đ
											</strong>
										</div>
									</div>
									<div class="order-col">
										<div>
											<strong>Phí ship:</strong>
										</div>
										<div>
											<strong class="order-cash-ship">
												0 đ
											</strong>
										</div>
									</div>

									<div class="order-col">
										<div style="width:50%">
											<strong>Nhập mã giảm giá:</strong>
										</div>
										<div style="width:30%">
											<input style="border: 2px dashed #000; border-radius: 4px; padding: 9px;"
												type="text" id="coupon-codes" name="coupon-codes"
												placeholder="Nhập mã giảm giá">
										</div>
										<div style="width:20%"><button type="button" id="applyCouponButton"
												style="background-color: #FE9705; color: #fff; border: none; border-radius: 4px; padding: 9px; cursor: pointer;"><strong>Áp
													dụng</strong></button></div>

									</div>
									<?php
									$coupon_data = array();
									$coupons = $coupon->getAllCoupon();
									foreach ($coupons as $couponValues) {
										$coupon_data[] = array(
											'coupon_code' => $couponValues['coupon_code'],
											'coupon_remain' => $couponValues['coupon_remain'],
											'min_order' => $couponValues['min_order'],
											'temp_cost' => $temp_cost
										);
									}

									echo '<script>';
									echo 'var couponData = ' . json_encode($coupon_data) . ';';
									echo '</script>';
									?>

									<div id="coupon-result" style="color: red;"></div>
									<script>
										document.getElementById("applyCouponButton").addEventListener("click", function (event) {
											event.preventDefault();
											applyCoupon();
										});

										function applyCoupon() {
											var couponCode = document.getElementById("coupon-codes").value;
											var couponResult = document.getElementById("coupon-result");
											if (couponCode !== '') {
												for (var i = 0; i < couponData.length; i++) {
													if (couponCode === couponData[i].coupon_code) {
														if (couponData[i].coupon_remain > 0) {
															if (couponData[i].temp_cost >= couponData[i].min_order) {
																$.ajax({
																	type: 'POST',
																	url: 'process.php',
																	data: { couponCode: couponCode },
																});
																setTimeout(function () {
																	location.reload();
																}, 1000);
																couponResult.innerHTML = 'Mã giảm giá "' + couponCode + '" được áp dụng thành công.';
																couponResult.style.cssText = 'color: green; font-family: Montserrat; font-weight: 500; margin-top:12px;margin-bottom:24px;';
																break;
															} else {
																couponResult.innerHTML = 'Giá trị đơn hàng chưa thỏa điều kiện.';
																couponResult.style.cssText = 'color: red; font-family: Montserrat; font-weight: 500; margin-top:12px;margin-bottom:24px;';
																break;
															}
														} else {
															couponResult.innerHTML = 'Số lượng mã giảm giá này đã hết.';
															couponResult.style.cssText = 'color: red; font-family: Montserrat; font-weight: 500; margin-top:12px;margin-bottom:24px;';
															break;
														}
													} else {
														couponResult.innerHTML = 'Mã giảm giá này không hợp lệ.';
														couponResult.style.cssText = 'color: red; font-family: Montserrat; font-weight: 500; margin-top:12px;margin-bottom:24px;';
													}
												}
											} else {
												couponResult.innerHTML = 'Không được bỏ trống, vui lòng nhập mã giảm giá.';
												couponResult.style.cssText = 'color: red; font-family: Montserrat; font-weight: 500; margin-top:12px;margin-bottom:24px;';
											}
										}
									</script>
									<?php
									$couponAmount = 0;
									if ($couponCode == $coupon_name && $couponCode != '') {
										$couponAmount = $coupon_amount;
									}
									?>
									<div class="order-col">
										<div>
											<strong>Mã giảm giá:</strong>
										</div>
										<div>
											<?php
											$_SESSION['couponAmount'] = $couponAmount;
											?>
											<h5 id="coupon-amount">
												<?php
												if ($coupon_type == 0) {
													$total_cost = $temp_cost - $couponAmount;
													echo number_format(-$couponAmount, 0, ',', '.');
												} else {
													$total_cost = $temp_cost * ((100 - $couponAmount) / 100);
													echo number_format(-($temp_cost * $coupon_amount / 100), 0, ',', '.');
												} ?> đ
												<?php $_SESSION['total_cost'] = $total_cost; ?>
											</h5>
										</div>
									</div>

									<div class="order-col" style="margin-top:12px">
										<div>
											<strong>Tổng tiền:</strong>
										</div>
										<div>
											<h4>
												<?php echo number_format($total_cost, 0, ',', '.') ?> đ
											</h4>
										</div>
									</div>
									<div>
										<div>
											<input type="radio" id="chuyen-khoan" name="payment_method" value="0"
												checked>
											<label for="chuyen-khoan">Chuyển khoản ngân hàng</label> (Cổng VNPAY)<div>
											</div>
											<img style="height:32px; width:84px; border:1px solid #ccc; padding:5px; border-radius:3px;"
												src="./img/vnpay.webp">
										</div>
									</div>

									<div>
										<div>
											<input type="radio" id="thanh-toan-khi-nhan-hang" name="payment_method"
												value="1">
											<label for="thanh-toan-khi-nhan-hang">Thanh toán khi nhận hàng</label> (Trả
											tiền mặt)<div></div>
											<img style="height:32px; width:84px; border:1px solid #ccc; padding:5px; border-radius:3px;"
												src="./img/tien-mat.jpg">
										</div>
									</div>
									<button class="primary-btn order-submit col-lg-offset-4" style="border-radius:6px;"
										type="submit" name="submit">
										ĐẶT HÀNG</a>
									</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<?php
include "footer.php";
?>