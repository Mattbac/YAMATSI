<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

<div id="profile">

	<h1>Modifier son profil</h1>

  <div id="user_information">
		<form action="" method="post" enctype="multipart/form-data">

				<!-- Edition du pseudo -->

				<div class="inputbox">
				<input type="text" name="nickname" id="nickname" value="<?= $compFormulaire['nickname'] ?>">
				<label for="nickname">Pseudo</label>
				</div>

				<div class="avatar">
					<img src="<?= $this->assetUrl('img/avatar/'.$compFormulaire['pictures_profile']) ?>" alt="Votre avatar">
				</div>
					<input type="file" name="file" class="picfile picspec">

				<!-- Edition de l'email -->

				<div class="inputbox">
					<input type="email" name="email" id="email" value="<?= $compFormulaire['email'] ?>">
					<label for="email">E-mail</label>
				</div>
				<!-- Edition du mdp plus confimation -->

				<div class="inputbox">
					<input type="password" name="password" id="password" >
					<label for="password">Nouveau mot de passe</label>
				</div>

				<div class="inputbox">
					<input type="password" name="confirmpassword" id="confirmpassword" >
					<label for="confirmpassword">Confirmation mot de passe</label>
				</div>
				<!-- Envoi du form -->

				<div class="alert">
				<?=	$errorPassword ?>
				</div>

				<button type="submit" name="edit">Modifier</button>

		</form>


  </div>

</div>

<?php $this->stop('main_content') ?>
