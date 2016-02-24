<?php include ROOT . '/views/layout/header.php';?>

		<!-- Banner -->
			<section id="banner">
				<h2><?php echo $titles['shop'];?></h2>
			</section>
			
			<section id="one" class="wrapper style1">
					<div class="container 75%">
						<div class="row 200%">
							<div class="6u 12u$(medium)">
								<header class="major">
									<h2><?php echo $service['name'];?></h2>
								</header>
							</div>
							<div class="feature-grid">
								<div class="feature">
									<div class="image rounded"><img src="/<?php echo $service['image'];?>" alt="" /></div>
									<div class="content">
										<header>
											<h4><?php echo $service['price'].' грн.';?></h4>
											<p>ставится на стол для гостей</p>
										</header>
										<p>Композиция устанавливается в специальном бокале на тонкой ножке, высота ножки и ширина бокала выбирается индивидуально. С таким букетом стол для гостей смотрится нарядно и праздично.</p>
									</div>
								</div>
							</div>
							<ul class="actions">
								<li><a href="#" class="button add-to-cart" data-id ="<?php echo $service['id'];?>">В корзину</a></li>
							</ul>
						</div>
					</div>
			</section>
			
<?php include ROOT . '/views/layout/footer.php';?>
		


