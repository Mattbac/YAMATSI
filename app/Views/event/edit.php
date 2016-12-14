<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

    <h1>Modifier un évènement</h1>
    <h2 class="subtitle">Dernière étape</h2>

    <form action="" method="post" >

        <div class="inputbox">
            <input type="text" name="name" id="name" value ="<?= $event['name']?>" required>
            <label for="name">Nom de l'évènement</label>
        </div>

        <div class="inputbox">
            <input type="text" name="adress" id="adress" value ="<?= $event['adress']?>" required>
            <label for="adress">Adresse</label>
        </div>

        <div class="inputbox">
            <label for="description" class="toplabel">Description de l'évènement</label>
            <textarea name="description" id="description" rows="15"><?= $event['description']?></textarea>
        </div>

        <input type="submit" name="submitformedit" value="Créer">

    </form>

<?php $this->stop('main_content') ?>
