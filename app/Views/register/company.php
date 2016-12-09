<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

	<h1>Inscription</h1>
	<h2><?= $message ?></h2>

	<hr>

	<section>
	    <form action="" method="post">

          <label for="name">Nom de l'entreprise</label>
	        <input type="text" name="name" id="name">

	        <label for="email">E-mail</label>
	        <input type="email" name="email" id="email">

	        <label for="confirmmail">Confirmez votre e-mail</label>
	        <input type="email" name="confirmmail" id="confirmmail">

	        <label for="password">Mot de passe</label>
	        <input type="password" name="password" id="password" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;">

	        <label for="confirmpassword">Confirmez votre mot de passe</label>
	        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;">

					<label for="message">Description de l'entreprise</label>
					<textarea name="message" ></textarea>

	        <!--<label for="verif">N° SIRET</label>
	        <input type="text" name="verif" id="verif">-->

	        <!--<label for="picture_first">Photo :</label>
	        <input type="file" name="pic" id="pic">-->

	        <input type="submit" name="submit" value="S'inscrire">

	    </form>
	</section>

<?php $this->stop('main_content') ?>
