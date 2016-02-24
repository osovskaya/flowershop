<?php include ROOT . '/views/layout/header.php';?>

		<!-- Banner -->
			<section id="banner">
				<h2><?php echo $titles['shopname']; ?></h2>
				<p>Краткий слоган <br /> </p>
				<ul class="actions">
					<li><a href="/shop" class="button special big">заказать</a></li>
				</ul>
			</section>

			<!-- One -->
				<section id="one" class="wrapper style1main">
					<div class="container 75%">
						<div class="row 200%">
							<div class="6u 12u$(medium)">
								<header class="major">
									<h2>Свадебный декор</h2>
									<p>Декорирование Вашей свадьбы цветами, украшение зала, свадебные аксессуары из цветов</p>
								</header>
							</div>
							<div class="6u$ 12u$(medium)">
								<p class="main">В нашем магазине мы подберем идеальный декор для Вашей свадьбы, поможем в выборе цветовой гаммы.</p>
								<p class="main">Основной составляющей свадебного декора является несомненно букет невесты. Для праздничной атмосферы на банкете зал украшают композиции из цветов в бокале, а также большая композиция на столе молодоженов. Для незабываемых фотографий с гостями предлагаем использовать арку, украшенную цветами. Также не обойтись на свадьбе без бутоньерок для жениха и дружек и цветочных браслетов для подружек невесты. </p>
							</div>
						</div>
					</div>
				</section>

				<!-- Two -->
				<section id="three" class="wrapper style1">
					<div class="container">
						<header class="major special">
							<h2>Букеты и цветочные композиции</h2>
							<p class="main">для свадьбы и для любого вашего праздника</p>
						</header>
						<div class="feature-grid">
							<div class="feature">
								<div class="image rounded"><img src="/template/images/svadebnyi-buket-1.jpg" alt="" /></div>
								<div class="content">
									<header>
										<h4>Букет невесты</h4>
										<p class="main">краткое описание</p>
									</header>
									<p class="main">Длинное подробное описание, типы цветов для букета, какие стили, букеты могут быть длинные, ниспадающие и небольшие, из декоративных или полевых цветов.</p>
								</div>
							</div>
							<div class="feature">
								<div class="image rounded"><img src="/template/images/glass1.jpg" alt="" /></div>
								<div class="content">
									<header>
										<h4>Букет в бокале</h4>
										<p class="main">ставится на стол для гостей</p>
									</header>
									<p class="main">Композиция устанавливается в специальном бокале на тонкой ножке, высота ножки и ширина бокала выбирается индивидуально. С таким букетом стол для гостей смотрится нарядно и праздично.</p>
								</div>
							</div>
							<div class="feature">
								<div class="image rounded"><img src="/template/images/table1.jpg" alt="" /></div>
								<div class="content">
									<header>
										<h4>Настольная композиция</h4>
										<p class="main">для украшения стола жениха и невесты</p>
									</header>
									<p class="main">Данная композиция является самой важной, так как стол молодоженов всегда в центре внимания и его вид придает праздичность всему залу</p>
								</div>
							</div>
							<div class="feature">
								<div class="image rounded"><img src="/template/images/haloween2.jpg" alt="" /></div>
								<div class="content">
									<header>
										<h4>Букет на хэллоуин</h4>
										<p class="main">такой тематический букет вы можете заказать для любого праздника</p>
									</header>
									<p class="main">Тематические композиции с использованием цветов помогут Вам создать соответствующую атмосферу праздника, будь то день рожденье, Пасха или Рождество.</p>
								</div>
							</div>
						</div>
					</div>
				</section>

			<!-- Three -->
				<section id="four" class="wrapper style3 special">
					<div class="container" >
						<header class="major">
							<h2>Сделайте свой праздник особенным</h2>
							<p class="main">вместе с <?php echo $titles['shopname']; ?></p>
						</header>
						<ul class="actions">
							<li><a href="#" class="button special big" id="go">связаться с нами</a></li>
						</ul>
					</div>
					<div id="modal_form"> 
						<?php include ROOT . '/views/main/contactform.php'; ?>
					</div>
					<div id="ovlay"> </div>
				</section>
				
				<script type="text/javascript" src="/template/js/jquery-for-mainpage.js"></script>

<?php include ROOT . '/views/layout/footer.php'; ?>
		