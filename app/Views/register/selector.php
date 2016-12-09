<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

<h1>Bienvenue !</h1>

<h2>Comment souhaitez-vous utiliser OutLooker ?</h2>

<section>
    <div><a href="register/user/">
        <p>En tant que</p>
        <h3>Particulier</h3>
    </div></a>
    <div><a href="register/assoc/">
        <p>En tant qu'</p>
        <h3>Association</h3>
    </div></a>
    <div><a href="register/comp/">
        <p>En tant qu'</p>
        <h3>Entreprise</h3>
    </div></a>
</section>

<?php $this->stop('main_content') ?>