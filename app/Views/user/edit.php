<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

	<h1>Inscription</h1>
	<h2><?= $message ?></h2>

	<hr>

	<section>
	    <form action="" method="post" enctype="multipart/form-data">

          <!-- Edition du pseudo -->

          <label for="nickname">Pseudo</label>
	        <input type="text" name="nickname" id="nickname" value="<?= $compFormulaire['nickname'] ?>">

					<label>Avatar</label>
					<input type="file" name="file">

          <!-- Edition de l'email -->

	        <label for="email">E-mail</label>
	        <input type="email" name="email" id="email" value="<?= $compFormulaire['email'] ?>">

          <!-- Edition du mdp plus confimation -->

	        <label for="password">Nouveau mot de passe</label>
	        <input type="password" name="password" id="password" >

	        <label for="confirmpassword">Confirmation de votre nouveau mot de passe</label>
	        <input type="password" name="confirmpassword" id="confirmpassword" >

          <!-- Envoi du form -->

	        <input type="submit" name="edit" value="Modifier">
					<a onclick="return confirm('Etes-vous sur de vouloir supprimer votre compte ?');">Supprimer votre profil</a>
	    </form>
	</section>

<?php $this->stop('main_content') ?>
