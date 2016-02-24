<?php include ROOT . '/views/layout/header.php';?>

		<!-- Banner -->
			<section id="banner">
				<h2><?php echo $titles['shop'];?></h2>
			</section>
			
			<section id="one" class="wrapper style1">
					<div class="container 100%">
						<div class="row 200%">
							<div class="4u 12u$(medium)">
								<header class="major">
									<h3>категории</h3>
									<?php foreach ($categoryList as $category):?>
									<p>
										<a href = "/shop/<?php echo $category['id'];?>/">
										<?php  echo $category['categoryname'];?>
										</a>
									</p>									
									<?php endforeach;?>
								</header>
							</div>
							<div class="8u$ 12u$(medium)">
								<div class="feature-grid">
									<?php foreach ($serviceList as $service):?>
										<div class="feature">
											<div class="image rounded"><img src="/<?php echo $service['image'];?>" alt="" /></div>
											<div class="content">
												<header>
													<h4><a href = "/shop/<?php echo $service['category'].'/'.$service['id'];?>/">
															<?php echo $service['name'];?>
														</a></h4>
													<p class="price"><?php echo $service['price'].' грн.';?></p>
												</header>
												<p><?php echo $service['description'];?></p>
												<ul class="actions">
													<a href="#" class="button alt small" data-id ="<?php echo $service['id'];?>">В корзину</a>
												</ul>											
											</div>
										</div>		
									<?php endforeach;?>
								</div>
							</div>
						</div>
					</div>
				</section>
				
<?php include ROOT . '/views/layout/footer.php';?>
		


