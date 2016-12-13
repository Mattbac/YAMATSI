<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

	<h1>Inscription</h1>
	<h2><?= $message ?></h2>

	<hr>

	<section>
	    <form action="" method="post" enctype="multipart/form-data">

          <label for="nickname">Nom</label>
	        <input type="text" name="nickname" id="nickname">

					<label>Avatar</label>
			 		<input type="file" name="file">

					<select id="type" name="type">
						<option value="outlooker">Outlooker</option>
 						<option value="comp">Entreprise</option>
 						<option value="assoc">Association</option>
					</select>

	        <label for="email">E-mail</label>
	        <input type="email" name="email" id="email">

	        <label for="confirmmail">Confirmez votre e-mail</label>
	        <input type="email" name="confirmmail" id="confirmmail">

	        <label for="password">Mot de passe</label>
	        <input type="password" name="password" id="password" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;">

	        <label for="confirmpassword">Confirmez votre mot de passe</label>
	        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;">

	        <input type="submit" name="submit" value="S'inscrire">

	    </form>
	</section>

<?php $this->stop('main_content') ?>
