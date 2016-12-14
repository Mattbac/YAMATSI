<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

<!-- SIMON A TOI DE JOUER -->
	<p><?= $user['nickname'] ?></p>
  <p><?= $user['email'] ?></p>
  <img src="<?= $this->assetUrl('img/avatar/'.$user['pictures_profile']) ?>" alt="imageProfil" height="150" >

    <a href="<?= $this->url('user_edit', ['user' => $this->getUser()]) ?>">Modifier</a>

<?php $this->stop('main_content') ?>
