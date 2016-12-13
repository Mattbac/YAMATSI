<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

	<h1>Inscription</h1>
	<h2><?= $message ?></h2>

	<hr>

	<section>
	    <form action="" method="post">

          <!-- Edition du pseudo -->

          <label for="nickname">Pseudo</label>
	        <input type="text" name="nickname" id="nickname" value="<?= $compFormulaire['nickname'] ?>">


          <!-- Edition de l'email plus confimation -->

	        <label for="email">E-mail</label>
	        <input type="email" name="email" id="email" value="<?= $compFormulaire['email'] ?>">

	        <label for="confirmmail">Confirmez votre e-mail</label>
	        <input type="email" name="confirmmail" id="confirmmail">

          <!-- Edition du mdp plus confimation -->

	        <label for="password">Nouveau mot de passe</label>
	        <input type="password" name="password" id="password" >

	        <label for="confirmpassword">Confirmation de votre nouveau mot de passe</label>
	        <input type="password" name="confirmpassword" id="confirmpassword" >

          <!-- Envoi du form -->

	        <input type="submit" name="edit" value="Modifier">

	    </form>
	</section>

<?php $this->stop('main_content') ?>
