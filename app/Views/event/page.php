<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

<div>
    <img src="" alt="">
    <h2><?php echo $event['name']?></h2>
    <p>Category: <?php echo $event['category_of'] ?></p>
    <p>Type: <?php echo $type ?></p>
</div>
<div>
    <button id="registeration_event">Participer</button>
    <button id="cancel_registeration_event">Se désincrire</button>
    <p>Ratio</p>
</div>
<div>
    <div>
    <a href="<?php echo $this->url('user_profil', ['id' => $event['users_id']]) ?>">Assoc/comp</a>
    </div>
    <div>
    <?php
    if($guests != ''){
        foreach ($guests as $guest) {
            echo "<a href=\"".$this->url('user_profil', ['id' => $guest['id']])."\">".$guest['nickname']."</a>";
        }
    }
    if($parts != ''){
        foreach ($parts as $part) {
            echo "<a href=\"".$this->url('user_profil', ['id' => $part['id']])."\">".$part['nickname']."</a>";
        }
    }?>
    </div>
</div>
<div>
    <p><?php echo $event['message'] ?></p>
    <p>horraire :</p>
    <table>
        <tr><td>Lundi</td><td>8h30</td><td>19h</td></tr>
        <tr><td>Mardi</td><td>9h</td><td>21h</td></tr>
    </table>
    <p><?php echo $event['adress']?></p>
</div>
<div>
    <h3>Qui participe ?</h3>
    <a href="<?php echo $this->url('user_profil', ['id' => $event['guest_part_id']]) ?>">Guest</a>
</div>
<button>Ajouter un commentaire</button>
<div id="add_new_comment">
    <label for="title">Titre de votre commentaire</label>
    <input id="title" type="text" name="title">
    <label for="com">Contenu de votre commentaire</label>
    <textarea name="com" id="com"></textarea>
    <button>Envoyer votre message</button>
</div>
<div>
    <h2>Commentaire</h2>
    <?php foreach ($coms as $com) {?>
    <div>
        <h3>Titre : <?php echo $com['title']?></h3>
        <p><?php echo $com['message']?></p>
        <p>Auteur : <a href="<?php echo $this->url('user_profil', ['id' => $com['users_id']]) ?>"><?php echo $com['nickname']?></a></p>
        <button>Repondre</button>
        <div id="answer_comment">

        </div>
        <div>
            <p><?php echo $com['message']?></p>
            <p>Auteur : <a href="<?php echo $this->url('user_profil', ['id' => $com['users_id']]) ?>"><?php echo $com['nickname']?></a></p>
        </div>
    </div>
    <?php }?>
</div>
<?php $this->stop('main_content') ?>

<?php $this->start('script_content') ?>
<script src="<?= $this->assetUrl('js/jquery-3.1.1.min.js') ?>"></script>
<script src="<?= $this->assetUrl('js/page_event.js') ?>"></script>
<?php $this->stop('script_content') ?>
