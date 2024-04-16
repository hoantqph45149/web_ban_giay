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
					<h2>Chọn giá</h2>
					<div class="of_price category-products">

						<form action="index.php?act=filter_price" method="post">
							<?php foreach ($list_of_price as $key => $value) { ?>
								<input type="radio" name="filter" id="" value="<?= $key ?>" onclick="return this.form.submit()"> <?= $value ?> <br>
							<?php } ?>
						</form>

					</div>

					<h2>Mua theo size</h2>
                    <div class="size-picker">
                        <form action="index.php?act=filter_size" method="post">
                            <ul>
                                <li>
                                    <input type="radio" id="size_38" name="size" value="EU.38"  onclick="return this.form.submit()">
                                    <label for="size_38">EU.38</label>
                                </li>
                                <li>
                                    <input type="radio" id="size_39" name="size" value="EU.39"  onclick="return this.form.submit()">
                                    <label for="size_39">EU.39</label>
                                </li>
                                <li>
                                    <input type="radio" id="size_40" name="size" value="EU.40"  onclick="return this.form.submit()">
                                    <label for="size_40">EU.40</label>
                                </li>
                                <li>
                                    <input type="radio" id="size_41" name="size" value="EU.41"  onclick="return this.form.submit()">
                                    <label for="size_41">EU.41</label>
                                </li>
                                <li>
                                    <input type="radio" id="size_41,5" name="size" value="EU.41,5"  onclick="return this.form.submit()">
                                    <label for="size_41,5">EU.41,5</label>
                                </li>
                                <li>
                                    <input type="radio" id="size_42" name="size" value="EU.42"  onclick="return this.form.submit()">
                                    <label for="size_42">EU.42</label>
                                </li>
                                <li>
                                    <input type="radio" id="size_42,5" name="size" value="EU.42,5"  onclick="return this.form.submit()">
                                    <label for="size_42,5">EU.42,5</label>
                                </li>
                                <li>
                                    <input type="radio" id="size_43" name="size" value="EU.43"  onclick="return this.form.submit()">
                                    <label for="size_43">EU.43</label>
                                </li>
                                <li>
                                    <input type="radio" id="size_43,5" name="size" value="EU.43,5"  onclick="return this.form.submit()">
                                    <label for="size_43,5">EU.43,5</label>
                                </li>
                            </ul>
                        </form>
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
								<span>Trạng thái: <strong><?php echo $trang_thai ?></strong></span>
							</span><br>
							<span>
								<span>Màu sắc: <strong><?php echo $mausac ?></strong></span>
							</span><br>
							<form action="index.php?act=addcart" method="post" id="addcart">
								<p>Số lượng: <input type="number" name="soluong" value="1" min="1" style=" width: 50px; padding: 5px 0;border: 1px solid #ccc;border-radius: 5px; text-align: center;"></p>
								<div class="size-picker">
									<h2>Kích cỡ</h2>
									<ul>
										<?php foreach ($dskt as $size) :  extract($size); ?>
											<li>
												<input type="radio" id="size_<?php echo $size['id']; ?>" name="size" value="<?php echo $size['id']; ?>">
												<label for="size_<?php echo $size['id']; ?>"><?php echo $size['tenkc']; ?></label>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>

								<?php
								echo '
										<input type="hidden"  name="id" value="' . $onesp['id'] . '">
										<input type="hidden" name="tensp" value="' . $title . '">
										<input type="hidden" name="img" value="' . $img . '">
										<input type="hidden" name="giasp" value="' . $price . '">
										<input type="hidden" name="mausac" value="' . $mausac . '">
										
										
										
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
							idpro: <?= $onesp['id'] ?>
						});

					});
				</script>
				<?php
				if (isset($_SESSION['user'])) {
					echo '<div id="reviews">
				</div>';
				} else {
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
		document.getElementById("addcart").addEventListener("submit", function(event) {
			var selectedSize = document.querySelector('input[name="size"]:checked');
			if (!selectedSize) {
				event.preventDefault();
				alert("Vui lòng chọn kích cỡ trước khi nhấn Thêm vào giỏ hàng.");
			}
		});
	</script>