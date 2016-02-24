<?php include ROOT . '/views/layout/header.php';?>

		<!-- Banner -->
			<section id="banner">
				<h2><?php echo $titles['shop']; ?></h2>
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
						</div>
					</div>
				</section>
				
<?php include ROOT . '/views/layout/footer.php';?>
		