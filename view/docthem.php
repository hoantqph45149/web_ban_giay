
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="blog-post-area" style="width: 100%;">
						<h2 class="title text-center">Tin tức của SHOPFASHION</h2>
						<div class="single-blog-post">
                            <?php
								extract($onebv);
								$hinh=$img_path.$img;
							?>
							<h3><?php echo $name?></h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-calendar"></i><?php echo $day?></li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img style="width: 100%;" src="<?php echo $hinh?>" alt="">
							</a>
							<p><?php echo $chitiet?></p>
						</div>					
					</div>
	
				</div>	
			</div>
		</div>
	</section>
	
