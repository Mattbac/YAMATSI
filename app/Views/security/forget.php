<?php $this->layout('layout', ['title' => 'Se connecter']) ?>

<?php $this->start('main_content') ?>
	<h1>Mot de passe oublié</h1>
	<form action="" method="post">
    <label for="email">Email :</label>
    <input type="email" name="email">

		<button name="forgetMdp">Envoyer</button>
	</form>

<?php $this->stop('main_content') ?>
