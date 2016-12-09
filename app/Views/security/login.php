<?php $this->layout('layout', ['title' => 'Se connecter']) ?>

<?php $this->start('main_content') ?>
	<h1>Se connecter</h1>
	<form action="<?= $this->url('security_login') ?>" method="post">
    <div>
			<label for="email">Email :</label>
			<input id="email" name="email" type="email" >
		</div>
		<div >
			<label for="password">Mot de passe :</label>
			<input id="password" name="password" type="password">
		</div>

		<button name="login">Se connecter</button>
	</form>
<a href="<?= $this->url('security_forget') ?>">Mot de passe oublié</a>
<?php $this->stop('main_content') ?>
