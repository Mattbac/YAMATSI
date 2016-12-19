<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

<div>
    <img src="" alt="">
    <h2><?php echo $event['name']?></h2>
    <p>Category: <strong><?php echo $category ?></strong></p>
    <p>Type: <strong><?php echo $type ?></strong></p>
</div>
<div>
    <?php
    if(!$is_connect){
        echo '<a id="not_connection" href="'.$this->url('security_login').'">Se connecter</a>';
    }else{
        if($is_register_event){
            echo '<button style="display:none;" id="registeration_event" data-event-id="'.$event['id'].'">Participer</button>';
            echo '<button id="cancel_registeration_event" data-event-id="'.$event['id'].'">Se désincrire</button>';
        }else{
            echo '<button id="registeration_event" data-event-id="'.$event['id'].'">Participer</button>';
            echo '<button style="display:none;" id="cancel_registeration_event" data-event-id="'.$event['id'].'">Se désincrire</button>';
        }
    }
    ?>
    <p>Ratio</p>
</div>
<div>
    <div>
    <a href="<?php echo $this->url('user_profil', ['id' => $event['users_id']]) ?>"><?php echo $createdBy['nickname']; ?></a>
    </div>
    <div class="eventview-guests">
    Guest(s) :
    <?php
    if($guests != ''){
        foreach ($guests as $guest) {
            echo "<a href=\"".$this->url('user_profil', ['id' => $guest['id']])."\">".$guest['nickname']."</a>";
        }
    }?>
    </div>
    <div class="eventview-partners">
    Partenaire(s) :
    <?php
    if($parts != ''){
        foreach ($parts as $part) {
            echo "<a href=\"/YAMATSI/public/user/".$part['id']."\">".$part['nickname']."</a>";
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
    <?php foreach($whoIsRegister as $register){?>
        <a href="<?php echo $this->url('user_profil', ['id' => $register['users_id']])?>"><?php echo $register['nickname'];?></a>
    <?php } ?>
</div>
<button id="add_comment">Ajouter un commentaire</button>
<div id="add_new_comment" data-event-id="<?php echo $event['id']?>">

</div>
<div>
    <h2>Commentaire</h2>
    <?php foreach ($comsFirst as $key => $com){
        if($com['title'] != null){?>
    <div>
        <h3>Titre : <?php echo $com['title']?></h3>
        <p><?php echo $com['message']?></p>
        <p>Auteur : <a href="<?php echo $this->url('user_profil', ['id' => $com['users_id']]) ?>"><?php echo $com['nickname']?></a></p>
        </div>
        <?php if(isset($comsAn[$key])){
            foreach ($comsAn[$key] as $comAnswer){?>
        <div>
            <p><?php echo $comAnswer['message']?></p>
            <p>Auteur : <a href="<?php echo $this->url('user_profil', ['id' => $com['users_id']]) ?>"><?php echo $comAnswer['nickname']?></a></p>
        </div>
        <?php }}?>
        <button class="add_answer_comment">Repondre</button>
        <div class="answer_comment" data-event-id="<?php echo $event['id']?>" data-com-id="<?php echo $com['id']?>">
    </div>
    <?php }}?>
</div>
<?php $this->stop('main_content') ?>

<?php $this->start('script_content') ?>
<script src="<?= $this->assetUrl('js/jquery-3.1.1.min.js') ?>"></script>
<script src="<?= $this->assetUrl('js/page_event.js') ?>"></script>
<?php $this->stop('script_content') ?>
