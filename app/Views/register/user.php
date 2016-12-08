<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

	<h1>Inscription</h1>
	<h2></h2>
	
	<hr>
	
	<section>
	    <form action="" method="post">
           
            <label for="nickname">Pseudo</label>
	        <input type="text" name="nickname" id="nickname">
	        
	        <label for="email">E-mail</label>
	        <input type="email" name="email" id="email">
	        <label for="confirmmail">Confirmez votre e-mail</label>
	        <input type="email" id="confirmmail">
	        
	        <label for="password">Mot de passe</label>
	        <input type="password" name="password" id="password" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;">
	        
	        <div>
	            <p>Le mot de passe doit contenir au moins une lettre et un chiffre.</p>
	        </div>
            
            <div>
	            <p>Le mot de passe requiert 8 caractères minimum.</p>
	        </div>
	        
	        <label for="confirmpassword">Confirmez votre mot de passe</label>
	        <input type="password" id="confirmpassword" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;">
	        
	        <input type="submit" value="S'inscrire">
	        
	    </form>
	</section>
	
<?php $this->stop('main_content') ?>
