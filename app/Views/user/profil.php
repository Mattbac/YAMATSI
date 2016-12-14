<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

<!-- SIMON A TOI DE JOUER -->
<div id="user_information">
	<img src="<?= $this->assetUrl('img/avatar/'.$user['pictures_profile']) ?>" alt="imageProfil" height="150" >
	<p><?= $user['nickname'] ?></p>
	<p><?= $user['email'] ?></p>
	<p><?= $user['message'] ?></p>
</div>
<div>
    <div id="futur_event">
        <div><p>Futur event</p></div>
    </div>
    <div id="paste_event">
        <div><p>Paste event</p></div>
    </div>
</div>
<?php $this->stop('main_content') ?>
