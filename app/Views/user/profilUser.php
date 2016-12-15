<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

<!-- SIMON A TOI DE JOUER -->
<div id="user_information">
    <img src="<?= $this->assetUrl('img/avatar/'.$user['pictures_profile']) ?>" alt="imageProfil" height="150" >
    <a href="<?= $this->url('user_edit', $user) ?>">Modifier</a>
    <p><?= $user['nickname'] ?></p>
    <p><?= $user['email'] ?></p>
    <p><?= $user['message'] ?></p>
</div>
<div>
    <div id="suggestion">
        <h2>Suggestion</h2>
        <div>
            <img src="" alt="">
            <p>Titre</p>
            <p>Description</p>
            <p>Type</p>
            <p>Catégory</p>
            <p>Date : Horraire</p>
        </div>
        <div>
            <img src="" alt="">
            <p>Titre</p>
            <p>Description</p>
            <p>Type</p>
            <p>Catégory</p>
            <p>Date : Horraire</p>
        </div>
    </div>
    <div id="futur_event">
        <h2>Futur event</h2>
        <div>
            <img src="" alt="">
            <p>Titre</p>
            <p>Description</p>
            <p>Type</p>
            <p>Catégory</p>
            <p>Date : Horraire</p>
        </div>
        <div>
            <img src="" alt="">
            <p>Titre</p>
            <p>Description</p>
            <p>Type</p>
            <p>Catégory</p>
            <p>Date : Horraire</p>
        </div>
    </div>
</div>
<div id="paste_event">
  	<h2>Paste event</h2>
    <div>
        <img src="" alt="">
        <p>Titre</p>
        <p>Description</p>
        <p>Type</p>
        <p>Catégory</p>
        <p>Note</p>
    </div>
</div>

<?php $this->stop('main_content') ?>
