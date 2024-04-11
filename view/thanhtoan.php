<form action="index.php?act=bill" method="post">
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Thanh toán</li>
				</ol>
			</div>
			<?php
			if (isset($_SESSION['user'])) {
				$fullname = $_SESSION['user']['fullname'];
				$user = $_SESSION['user']['username'];
				$email = $_SESSION['user']['email'];
				$sdt = $_SESSION['user']['phone_number'];
				$address = $_SESSION['user']['address'];
			} else {
				$fullname = "";
				$user = "";
				$email = "";
				$sdt = "";
				$address = "";
			}
			// var_dump($_SESSION['user']);
			?>
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Thông tin người mua hàng</p>


							<style>
								.shopper-info>.thongtin {
									background: #F0F0E9;
									border: 0 none;
									margin-bottom: 10px;
									padding: 10px;
									width: 100%;
									font-size: 14px;
								}
							</style>
							<input class="thongtin" type="text" placeholder="Tên hiển thị" name="fullname" value="<?= $fullname ?>">
							<?php if (isset($error_messages['fullname'])) echo '<p class="error" style="color: red ; font-size: 14px;">' . $error_messages['fullname'] . '</p>'; ?>
							<input class="thongtin" type="email" placeholder="Email" name="email" value="<?= $email ?>">
							<?php if (isset($error_messages['email'])) echo '<p class="error" style="color: red ; font-size: 14px;">' . $error_messages['email'] . '</p>'; ?>
							<input class="thongtin" type="tel" placeholder="Số điện thoại" name="phone_number" value="<?= $sdt ?>">
							<?php if (isset($error_messages['phone_number'])) echo '<p class="error" style="color: red ; font-size: 14px;">' . $error_messages['phone_number'] . '</p>'; ?>
							<input class="thongtin" type="text" placeholder="Địa chỉ" name="address" value="<?= $address ?>">
							<?php if (isset($error_messages['address'])) echo '<p class="error" style="color: red ; font-size: 14px;">' . $error_messages['address'] . '</p>'; ?>
							<a class="btn btn-primary" href="index.php">Mua thêm</a>
							<input class="btn btn-primary" type="submit" name="dathang" value="Đặt hàng">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Phương thức thanh toán</p>
							<select name="pttt" id="payment-method">
								<option value="">Chọn phương thức thanh toán</option>
								<option value="1">1: Thanh toán bằng VNPAY</option>
								<option value="2">2: Kiểm tra thanh toán</option>
								<option value="3">3: Paypal</option>
							</select>
						</div>
						<?php if (isset($error_messages['pttt'])) echo '<p class="error" style="color: red ;">' . $error_messages['pttt'] . '</p>'; ?>
					</div>

					<div class="col-sm-4">
						<div class="order-message">
							<p>Để vận chuyển</p>
							<textarea name="ghichu" placeholder="Ghi chú về đơn hàng của bạn"></textarea>
						</div>
					</div>

				</div>
			</div>
			<div class="review-payment">
				<h2>Xem lại và thanh toán</h2>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Gía</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td class="description">kích cỡ</td>
						</tr>
					</thead>
					<?php
					$tong = 0;
					$tamtinh = 0;
					$i = 0;
					foreach ($_SESSION['cart'] as $mycart) {
						$hinh = $img_path . $mycart[2];
						$thanhtien = $mycart[4] * $mycart[3];
						$phi = 15000;
						$tamtinh += $thanhtien;
						$tong = $tamtinh + $phi;
					?>
						<tbody>
							<tr>
								<td class="cart_product">
									<a href=""><img style="width:110px; heght:110px;" src="<?php echo $hinh ?>" alt=""></a>
								</td>
								<td class="cart_description">
									<h4><a href=""><?php echo $mycart[1] ?></a></h4>
								</td>
								<td class="cart_price">
									<p><?php echo number_format("$mycart[3]") . "" ?> VND</p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_input">
										<input class="cart_quantity_input" type="text" name="quantity" value="<?= $mycart[4] ?>">
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price"><?php echo number_format("$thanhtien") . "" ?> VND</p>
								</td>
								<td class="cart_description">
									<h4><a href=""><?php echo $mycart[5] ?></a></h4>
								</td>
							</tr>
						</tbody>
					<?php
					}
					?>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6"></div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tạm tính <span><?php echo number_format("$tamtinh") . "" ?> VND</span></li>
							<li>Gía vận chuyển <span><?php echo number_format("$phi") . "" ?> VND</span></li>
							<li>Tổng tiền <span><?php echo number_format("$tong") . "" ?> VND</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
</form>
<style>
	.order-message select {
		width: 100%;
		padding: 10px;
		margin-top: 5px;
		margin-bottom: 10px;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}

	.order-message select:focus {
		outline: none;
		border-color: #007bff;
		box-shadow: 0 0 5px #007bff;
	}

	.order-message select option {
		padding: 10px;
	}
</style>