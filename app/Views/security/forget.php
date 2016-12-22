<?php $this->layout('layout', ['title' => 'Se connecter']) ?>

<?php $this->start('main_content') ?>
	<h1>Mot de passe oublié</h1>

	<p>Un e-mail contenant un lien qui vous permettra de redéfinir votre mot de passe vous sera envoyé.</p>

	<form action="" method="post">

		<div class="inputbox">
	    <input type="email" name="email" required>
			<label for="email">Email :</label>
		</div>

		<button name="forgetMdp">Envoyer</button>
	</form>

<?php $this->stop('main_content') ?>
