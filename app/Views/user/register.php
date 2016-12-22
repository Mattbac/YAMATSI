<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

	<h1>Inscription</h1>

	<h2 class="subtitle">Plus qu'une étape !</h2>

  <?= $message ?>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="inputbox">
            <select name="type" id="type">
                <option value="">Qui êtes vous ?</option>
                <option value="user">Particulier</option>
                <option value="assoc">Association</option>
                <option value="comp">Entreprise</option>
            </select>
        </div>

        <div class="inputbox">
            <input type="text" name="nickname" id="nickname" required>
            <label for="nickname">Pseudo</label>
        </div>

        <div class="inputbox">
            <input type="email" name="email" id="email" required>
            <label for="email">E-mail</label>
        </div>

        <div class="inputbox">
            <input type="email" name="confirmmail" id="confirmmail" required>
            <label for="confirmmail">Confirmer votre e-mail</label>
        </div>

        <div class="inputbox">
            <input type="password" name="password" id="password" required>
            <label for="password">Mot de passe</label>
        </div>

        <div class="alert hidden">
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            <p>Le mot de passe doit contenir <strong>au moins une lettre et un chiffre</strong>.</p>
        </div>

        <div class="alert hidden">
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            <p>Le mot de passe requiert <strong>8 caractères minimum</strong>.</p>
        </div>

        <div class="inputbox">

            <input type="password"  name="confirmpassword" id="confirmpassword" required>
            <label for="confirmpassword">Confirmez le mot de passe</label>

        </div>

       <div class="orga">
            <div class="inputbox inputassoc">

                <input type="text" name="rna" id="rna">
                <label for="rna">Numéro d'inscription au RNA</label>

            </div>
            <div class="inputbox inputcomp">

            <input type="text" name="siret" id="siret">
            <label for="rna">Numéro SIRET</label>

            </div>
            <div class="inputbox">

                <label for="userpic" class="filetitle">Photo <i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                <input type="file" name="file" id="userpic" class="picfile">

            </div>
       </div>

        <input class="endform" type="submit" name="submit" value="S'inscrire">

    </form>

<?php $this->stop('main_content') ?>
