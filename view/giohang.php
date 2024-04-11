
<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Đơn giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td class="description">kích cỡ</td>
							<td class="total">Thao tác</td>
						</tr>
					</thead>
					<?php
					 global $img_path;
						//   Echo '<pre>';
						//   Print_r($_SESSION['cart']);
						//   Echo '</pre>';
						$tong=0;
						$tamtinh=0;
						$i=0;
						foreach ($_SESSION['cart'] as $mycart) {
							$hinh=$img_path.$mycart[2];
							$thanhtien=$mycart[4]*$mycart[3];
							$phi=15000;
							$tamtinh+=$thanhtien;
							$tong=$tamtinh+$phi;
                            $xoacart='index.php?act=xoacart&idcart='.$i;			
					?>
					<tbody>
						<tr>
							<td class="cart_product">
								<a href=""><img style="width:110px; heght:110px; " src="<?php echo $hinh ?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $mycart[1] ?></a></h4>
							</td>
							<td class="cart_price">
								<p><?php echo number_format("$mycart[3]").""?> VND</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_input">
									<input style="width: 50px;" class="cart_quantity_input" type="text"  value="<?=$mycart[4]?>">
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo number_format("$thanhtien").""?> VND</p>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $mycart[5] ?></a></h4>
							</td>
							<td style="text-align: center;border:none;" class="cart_delete">
								<a  class="cart_quantity_delete" href="<?php echo ("$xoacart")?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>						
					</tbody>
					<?php
					$i+=1;
						}
					?>
				</table>
			</div>
		</div>
	</section> 
	<!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6"></div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tạm tính <span><?php echo number_format("$tamtinh").""?> VND</span></li>
							<li>Gía vận chuyển <span><?php echo number_format("$phi").""?> VND</span></li> 
							<li>Tổng tiền <span><?php echo number_format("$tong").""?> VND</span></li>
						</ul>
							<!-- <input type="submit" name="submit" class="btn btn-default update" value="Mua ngay"> -->
							<!-- <a class="btn btn-default update" href="">Update</a>-->
							<a class="btn update" href="index.php?act=muangay">Mua ngay</a> 
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	