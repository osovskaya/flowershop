<?php include ROOT . '/views/layout/header.php';?>

		<!-- Banner -->
			<section id="banner">
				<h2><?php echo $titles['cart'];?></h2>				
			</section>
			
			<section id="one" class="wrapper style1">
					<div class="container 75%">
						<div class="row 200%">
							<div class="12u 12u$(medium)">
								<header class="major" align="center">
									<h4>Для оформления заказа введите Ваши контактные данные</h4>
								</header>
							</div>
						</div>
					</div>		
			</section>
			
			<section>
				<form method="post" action="/cart/submit">
					<div class="row uniform 50%">
						<div class="6u 12u$(xsmall)">
							<label for="name"><?php if($message['name']){echo 'Введите Ваше реальное имя';}?></label>
							<p><input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="name" /></p>
							<p><input type="email" name="email" id="email" value="<?php echo $email; ?>" placeholder="Email" /></p>
							<label for="phone"><?php if($message['phone']){echo 'Введите телефон в формате 380ХХ ХХХ ХХ ХХ';}?></label>
							<p><input type="text" name="phone" id="phone" value="<?php echo $phone; ?>" placeholder="phone" /></p>
						</div>
						<div class="12u$">
							<ul class="actions">
							<li><input type="submit" value="Оформить" class="special" /></li>
							</ul>
						</div>
					</div>
				</form>
			</section>

<?php include ROOT . '/views/layout/footer.php';?>
		


