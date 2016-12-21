<?php $this->layout('layoutevent', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

<div class="eventview-header eventpage-header">

    <h1><?php echo $event['name']?></h1>
    <p>Catégorie: <strong><?php echo $category ?></strong></p>
    <p>Type: <strong><?php echo $type ?></strong></p>

    <div class="eventview-interact eventpage-header-lane">

        <?php
        if(!$is_connect){
            echo '<a id="not_connection" href="'.$this->url('security_login').'">Se connecter</a>';
        }else{
            if($is_register_event){
                echo '<button style="display:none;" id="registeration_event" data-event-id="'.$event['id'].'">Je participe <i class="fa fa-check" aria-hidden="true"></i></button>';
                echo '<button id="cancel_registeration_event" data-event-id="'.$event['id'].'">Se désinscrire</button>';
            }else{
                echo '<button id="registeration_event" data-event-id="'.$event['id'].'">Je participe <i class="fa fa-check" aria-hidden="true"></i></button>';
                echo '<button style="display:none;" id="cancel_registeration_event" data-event-id="'.$event['id'].'">Se désinscrire</button>';
            }
        }
        ?>

        <div class="rating"><i class="fa fa-square" aria-hidden="true"></i><i class="fa fa-square" aria-hidden="true"></i><i class="fa fa-square" aria-hidden="true"></i><i class="fa fa-square" aria-hidden="true"></i></div>

    </div>

    <img src="<?= $this->assetUrl('img/default_event.jpg') ?>" alt="<?php echo $event['name']?>">

</div>

<div class="eventview-infos">

    <div class="eventview-organiszer">
    par <a href="<?php echo $this->url('user_profil', ['id' => $event['users_id']]) ?>"><?php echo $user['nickname']; ?></a>
    </div>
    <div class="eventview-guests">
    Guest(s) :
    <?php
    if($guests != ''){
        foreach ($guests as $guest) {
            echo "<a href=\"".$this->url('user_profil', ['id' => $guest['id']])."\">".$guest['nickname']."</a> ";
        }
    } ?>
    </div>
    <div class="eventview-partners">
      Partenaire(s) :
    <?php
    if($parts != ''){
        foreach ($parts as $part) {
            echo "<a href=\"".$this->url('user_profil', ['id' => $part['id']])."\">".$part['nickname']."</a> ";
        }
     }?>
   </div>

    <div class="eventview-text">
        <p><?php echo $event['message'] ?></p>
        <p>Horaires :</p>
        <table>
            <?php foreach($planning as $day){
                if((new \DateTime())->getTimestamp() < $day[1]){?>
                <tr><td><?php echo date("j-m-Y", $day[0])?></td><td><?php echo date("h\hi", $day[0])?></td><td><?php echo date("h\hi", $day[1])?></td></tr>
            <?php }} ?>
        </table>
        <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $event['adress']?></p>
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

<div class="eventview-comments">
    <h2>Commentaire</h2>
    <?php foreach ($comsFirst as $key => $com){
        if($com['title'] != null){?>
    <div class="comment">
        <h3>Titre : <?php echo $com['title']?></h3>
        <div class="comment-content">
        <p data-com-id="<?php echo $com['id']?>"><?php echo $com['message']?></p>
        <p>Auteur : <a href="<?php echo $this->url('user_profil', ['id' => $com['users_id']]) ?>"><?php echo $com['nickname']?></a></p>
        </div>

        <div class="answer">
          <?php if(isset($comsAn[$key])){
              foreach ($comsAn[$key] as $comAnswer){?>
          <div class="comment-content">
              <p data-com-id="<?php echo $comAnswer['id']?>"><?php echo $comAnswer['message']?></p>
              <p>Auteur : <a href="<?php echo $this->url('user_profil', ['id' => $com['users_id']]) ?>"><?php echo $comAnswer['nickname']?></a></p>
              <?php if($id_user_connect == $com['users_id']){?>
                <button class="editanswer">Editer</button>

                <div class="answer_edit_comment" data-event-id="<?php echo $event['id']?>" data-com-id="<?php echo $com['id']?>"> </div>
              <?php }?>
          </div>
        </div>
      </div>
        <?php }}?>
        <button class="add_answer_comment">Repondre</button>
        <div class="answer_comment" data-event-id="<?php echo $event['id']?>" data-com-id="<?php echo $com['id']?>"></div>
    <?php }}?>
</div>
<?php $this->stop('main_content') ?>

<?php $this->start('script_content') ?>
<script src="<?= $this->assetUrl('js/jquery-3.1.1.min.js') ?>"></script>
<script src="<?= $this->assetUrl('js/page_event.js') ?>"></script>
<?php $this->stop('script_content') ?>
