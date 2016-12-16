<?php $this->layout('layout', ['title' => 'Se connecter']) ?>

<?php $this->start('main_content') ?>

	<h1>Se connecter</h1>
	<form action="<?= $this->url('security_login') ?>" method="post">

    <div class="inputbox">
			<input id="email" name="email" type="email" required>
			<label for="email">Email :</label>
		</div>

		<div class="inputbox">
			<input id="password" name="password" type="password" required>
			<label for="password">Mot de passe :</label>
		</div>

		<div class="forget">
			<a href="<?= $this->url('security_forget') ?>">Mot de passe oublié ?</a>
		</div>

		<input type="submit" name="login" value="Se connecter">

	</form>

		<a href="<?= $this->url('user_register') ?>"><button class="not-registered">Pas inscrit ?</button></a>

		<?php $this->stop('main_content') ?>
