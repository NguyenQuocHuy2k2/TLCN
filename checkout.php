<?php
session_start();
include "headeruser.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<title>Capple - Website bán đồ ăn, trái cây , rau củ trực tuyến</title>

<!-- Google font -->
<link
	href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700"
	rel="stylesheet">

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
				<form id="orderForm" action="addorderdetail.php?ids=<?php echo $_GET['ids'] ?>"method="post">
					<div>
						<h2 class="title" style="border-radius:6px; margin-left:15px">Thanh toán</h2>
					</div>
					<div class="col-md-6">
						<div class="billing-details" style="border-top: 1px solid #ccc">
							<div class="section-title">
								<h3 class="title" style="border-radius:6px;">Thông tin người nhận</h3>
							</div>
							<?php if (isset($_SESSION['user'])) :
								$getInfoByUsername = $user->getInfoByUsername($_SESSION['user']);
								foreach ($getInfoByUsername as $value) :
							?>
							<div class="form-group">
								<h5>Họ & tên*</h5>
								<input class="input" type="text" name="full name"
									placeholder="Full Name"
									value="<?php echo $value['First_name'] . $value['Last_name'] ?>"
									readonly>
							</div><h5>Địa chỉ nhận hàng*</h5>
							<div class="form-group">
								<input class="input" type="text" name="address"
									placeholder="Địa chỉ nhận hàng" required>
							</div>
							<h5>Số điện thoại*</h5>
							<div class="form-group">
								<input class="input" type="tel" name="phone"
									placeholder="Điện thoại" value="<?php echo $value['phone'] ?>"
									required>
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
										<?php if (isset($_SESSION['cart'])) :
										$total_cost = 0;
										$ids = explode(',', $_GET['ids']);
										$getAllProducts = $product->getAllProducts();
										foreach ($getAllProducts as $value) :
											if (in_array($value['id'], $ids)) : ?>
										<div class="order-col">
										<h5><img width="145" height="145" alt="poster_1_up"
												class="shop_thumbnail"
												src="img/<?php echo $value['pro_image']; ?>"> x <?php echo $_SESSION['cart'][$value['id']]?></h5>
											<div style="width:60%">
												<strong>
													<?php echo $value['name'] ?><div></div> <?php echo number_format($value['discount_price'],0,',','.')?> đ
												</strong>
											</div>
										</div>
										<div class="order-col">
											<div>
												<strong>Tạm tính:</strong>
											</div>
											<div>
												<strong class="order-cash-total">
													<?php echo number_format($_SESSION['cart'][$value['id']] * $value['discount_price'],0,',','.') ?> đ
												</strong>
											</div>
										</div>
										<?php $total_cost += ($_SESSION['cart'][$value['id']] * $value['discount_price']) ?>
										<?php $_SESSION['total_cost'] = $total_cost; ?>
										<hr style="border-color: #ccc">
										<?php	
											endif;
												endforeach;	
											endif
											?>
										<div class="order-col">
											<div>
												<strong>Tiền hàng:</strong>
											</div>
											<div>
												<strong class="order-cash-total">
													<?php echo number_format($total_cost,0,',','.') ?> đ
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
										<div>
												<strong>Tổng tiền:</strong>
											</div>
											<div>
												<h4>
													<?php echo number_format($total_cost,0,',','.') ?> đ
											</h4>
											</div>
										</div>
										<div>
											<div>
												<input type="radio" id="chuyen-khoan" name="payment_method" value="0">
												<label for="chuyen-khoan">Chuyển khoản ngân hàng</label> (Cổng VNPAY)<div></div>
												<img style="height:32px; width:84px; border:1px solid #ccc; padding:5px; border-radius:3px;" src="./img/vnpay.webp">
											</div>
										</div>

										<div>
											<div>
												<input type="radio" id="thanh-toan-khi-nhan-hang" name="payment_method" value="1">
												<label for="thanh-toan-khi-nhan-hang">Thanh toán khi nhận hàng</label> (Trả tiền mặt)<div></div>
												<img style="height:32px; width:84px; border:1px solid #ccc; padding:5px; border-radius:3px;" src="./img/tien-mat.jpg">
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