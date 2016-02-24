<?php include ROOT . '/views/layout/header.php';?>

		<!-- Banner -->
			<section id="banner">
				<h2><?php echo $titles['cart'];?></h2>
				<ul class="actions">
					<li><a href="/shop" class="button special big">продолжить</a></li>
				</ul>
			</section>
			
			<section id="one" class="wrapper style1">
					<div class="container 75%">
						<div class="row 200%">
							<div class="12u 12u$(medium)">
								<header class="major" align="center">
									<h2>Ваш заказ</h2>
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
											<th>№ п/п</th>
											<th>Наименование</th>
											<th>Цена, грн.</th>
											<th>Кол-во</th>
											<th>Сумма, грн.</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php $n = 1; foreach ($services as $service):?>
										<tr>
											<td><?php echo $n; $n++;?></td>
											<td><?php echo $service['name'];?></td>
											<td><?php echo $service['price'];?></td>
											<td><?php echo $order[$service['id']];?></td>
											<td><?php echo $service['price'] * $order[$service['id']];?></td>
											<td><a href="/cart/delete/<?php echo $service['id'];?>">удалить</a></td>
										</tr>
										<?php endforeach;?>										
									</tbody>
									<tfoot>
										<tr>
											<td colspan="4"></td>
											<td><?php echo $totalSum;?> грн.</td>
										</tr>
									</tfoot>
								</table>
							</div>
							<div class="row 200%">
								<div class="6u 6u$(medium)">
									<ul class="actions">
										<li>
											<a href="/cart/order" class="button special">Оформить заказ</a>
											<a href="/cart/clear" class="button special clear">Очистить корзину</a>
										</li>
									</ul>
								</div>
							</div>
						</section>						

<?php include ROOT . '/views/layout/footer.php';
	

?>
		


