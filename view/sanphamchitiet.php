<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Danh mục</h2>
					<div class="panel-group category-products" id="accordian">
						<?php
						foreach ($dsdm as $dm) {
							extract($dm);
							$linkdm = 'index.php?act=danhmuc&iddm=' . $id;
							echo '
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><a href="' . $linkdm . '">' . $name . '</a></h4>
                                            </div>
                                        </div>
                                         ';
						}
						?>
					</div>
					<!--/category-products-->

					<div class="brands_products">
						<!--brands_products-->
						<h2>Thương hiệu</h2>
						<div class="brands-name">
							<ul class="nav nav-pills nav-stacked">
								<li>
									<a href="#"> <span class="pull-right">(50)</span>Acne</a>
								</li>
								<li>
									<a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a>
								</li>
								<li>
									<a href="#"> <span class="pull-right">(27)</span>Albiro</a>
								</li>
								<li>
									<a href="#"> <span class="pull-right">(32)</span>Ronhill</a>
								</li>
								<li>
									<a href="#"> <span class="pull-right">(5)</span>Oddmolly</a>
								</li>
								<li>
									<a href="#"> <span class="pull-right">(9)</span>Boudestijn</a>
								</li>
								<li>
									<a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-9 padding-right">
				<div class="product-details">
					<div class="col-sm-5">
						<div class="view-product">
							<?php
							extract($onesp);
							$img = $img_path . $img;
							echo '<img src="' . $img . '" alt="" />';
							?>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="product-information">
							<?php
							if (isset($bienthe)) {
								foreach ($bienthe as $bt) {
									extract($bt);
									// var_dump($bt);
									$mausac = load_mausac($bt['mams']);
								}
							} else {
							}
							// if (isset($mausac)) {
							// 	foreach ($mausac as $ms) {
							// 		if ($ms['id'] == $bt['mams']) {
							// 			$name_color = $ms['tenms'];
							// 			// var_dump($name_color);
							// 		}
							// 	}
							// }else{

							// }
							extract($onesp);
							// var_dump($onesp);
							if ($soluong > 0) {
								$trang_thai = "Còn hàng";
							} else {
								$trang_thai = "Hết hàng";
							}
							?>
							<img src="images/product-details/new.jpg" class="newarrival" alt="" />
							<h2><?php echo $title ?></h2>
							<img src="images/product-details/rating.png" alt="" /></br>
							<span>
								<span style=" font-size: 25px; font-weight: 700;"><?php echo number_format("$price") . "" ?></span>
							</span></br>
							<span>
								<span>Trạng thái: <?php echo $trang_thai ?></span>
							</span><br>
							<form action="index.php?act=addcart" method="post" onsubmit="return validateSize()">
							<p>Số lượng: <input type="number" name="soluong" value="1" min="1" style=" width: 50px; padding: 5px 0;border: 1px solid #ccc;border-radius: 5px; text-align: center;"></p>
								<?php 
								if (isset($mausac)) {
								foreach ($mausac as $ms) {
									if ($ms['id'] == $bt['mams']) {
										$name_color = $ms['tenms'];
										// var_dump($name_color);
									}
								?>
									<input type="radio" name="mausac" id="" value="<?= $ms['id'] ?>"> <?= $name_color ?> <br>
								<?php }} ?>
								<div class="product-size-selector">
									<label for="product-size">Chọn size:</label>
									<select id="product-size" name="size">
										<option value="">Chọn size</option>
										<?php foreach ($dskt as $size) : ?>
											<option value="<?php echo $size['makc']; ?>"><?php echo $size['tenkc']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<?php
								echo '
										<input type="hidden"  name="id" value="' . $id . '">
										<input type="hidden" name="tensp" value="' . $title . '">
										<input type="hidden" name="img" value="' . $img . '">
										<input type="hidden" name="giasp" value="' . $price . '">
										
										
										
										<input class="product-information--btn" type="submit" name="addcart" value="Thêm vào giỏ hàng">                                            
						    </form>
									
									';
								?>
						</div>
					</div>
				</div>
				<div class="mota">
					<h4>Mô tả của sản phẩm</h4>
					<p><?php echo $mota; ?></p>
				</div>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
				<script>
					$(document).ready(function() {

						$("#reviews").load("view/binhluan.php", {
							idpro: <?= $id ?>
						});

					});
				</script>
				<?php 
				if(isset( $_SESSION['user'])){
					echo '<div id="reviews">
				</div>';
				}else{
					echo '<div class="mota" style="color: red;"> <h4> Đăng nhập để được bình luận đánh giá sản phẩm </h4> </div>';
				}
				?>
				
			</div>
		</div>
	</div>
	<style>
		.mota {
			margin-left: 20px;
			margin-top: 30px;
		}

		.mota h4 {
			font-weight: 700;
		}

		.mota p {
			font-size: 16px;
		}
	</style>
	<script>
		function validateSize() {
			var sizeSelect = document.getElementById("product-size");
			var selectedSize = sizeSelect.value;
			if (selectedSize === "") {
				alert("Vui lòng chọn một size trước khi thêm vào giỏ hàng.");
				return false;
			}
			return true;
		}
	</script>