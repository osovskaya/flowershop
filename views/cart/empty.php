<?php include ROOT . '/views/layout/header.php';?>

		<!-- Banner -->
			<section id="banner">
				<h2><?php echo $titles['cart'];?></h2>
				<ul class="actions">
					<li><a href="/shop" class="button special big">заказать</a></li>
				</ul>
			</section>
			
			<section id="one" class="wrapper style1">
					<div class="container 75%">
						<div class="row 200%">
							<div class="12u 12u$(medium)">
								<header class="major" align="center">
									<h2>Ваша корзина пустая :(</h2>
								</header>
							</div>
						</div>
					</div>		
			</section>
			
					<!-- Table -->
						<section>
							<div class="table-wrapper">
								<table>
									<thead>
										<tr>
											<th>Категория</th>
											<th>Наименование</th>
											<th>Цена</th>
											<th>Кол-во</th>
											<th>Сумма</th>
										</tr>
									</thead>
									<tbody>
																				
									</tbody>
									<tfoot>
										<tr>
											<td colspan="4"></td>
											<td></td>
										</tr>
									</tfoot>
								</table>
							</div>							
						</section>

<?php include ROOT . '/views/layout/footer.php';?>
		


