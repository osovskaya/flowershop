<!--Вставляется с помощью js скрипта в /views/main/index.php div id="modal_form", файл jquery-for-main-page.js -->
 <section>
	<h3>Форма обратной связи</h3>
	<form method="post" action="/main/contactform" id="contactform">
		<div class="row uniform 50%">
			<div class="6u 12u$(xsmall)">
				<input type="text" name="name" required id="name" value="" placeholder="Name" />
			</div>
			<div class="6u$ 12u$(xsmall)">
				<input type="email" name="email" required id="email" value="" placeholder="Email" />
			</div>
			<div class="12u$">
				<textarea name="message" required id="message" placeholder="Enter your message" rows="6"></textarea>
			</div>
			<div class="12u$" id="submit">
				<ul class="actions">
					<li><input type="submit" name="submit" value="отправить" class="special"/></li>
				</ul>
			</div>
		</div>
	</form>
	<div  id="msg"></div>					
</section>

