<?php $this->layout('layout', ['title' => 'Réinitialisation du mot de passe']) ?>

<?php $this->start('main_content') ?>

  <p>Changer de mot de passe</p>
    <form method="POST">
      <input type="password" name="password" placeholder="mot de passe">
      <input type="password" name="password-cf" placeholder="confirmer votre mot de passe">
      <button name="resetMdp"> Redefinir mon mot de passe </button>
    </form><p><?= $error ?></p>

<?php $this->stop('main_content') ?>
