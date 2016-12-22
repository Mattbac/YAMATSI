<?php $this->layout('layout', ['title' => 'Réinitialisation du mot de passe']) ?>

<?php $this->start('main_content') ?>

  <h1>Changer de mot de passe</h1>
    <form method="POST">

      <div class="inputbox">
      <input type="password" name="password">
      <p>doit contenir au moins 8 caractères.</p>
      <label for="password">Nouveau mot de passe</label>
      </div>

      <div class="inputbox">
      <input type="password" name="password-cf">
      <label for="password-cf">Confirmer le mot de passe</label>
      </div>

      <button name="resetMdp"> Redéfinir le mot de passe </button>
    </form><div class="alert"><?= $error ?></div>

<?php $this->stop('main_content') ?>
