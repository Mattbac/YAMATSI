<button class="cancelling-cross">
    <i class="fa fa-times" aria-hidden="true"></i>
</button>

<div class="eventview-header">

    <h1><a href="<?php echo $this->url('event_page', ['id' => $event['id']]);?>"><?php echo $event['name']?> <i class="fa fa-external-link-square" aria-hidden="true"></i></a></h1>
    <p>Catégorie: <strong><?php echo $category ?></strong></p>
    <p>Type: <strong><?php echo $type ?></strong></p>

    <div class="eventview-interact">

        <?php
        if($is_connect){
            if($w_user['type'] == 'user'){
                if($is_register_event){
                    echo '<button style="display:none;" id="registeration_event" data-event-id="'.$event['id'].'">Je participe <i class="fa fa-check" aria-hidden="true"></i></button>';
                    echo '<button id="cancel_registeration_event" data-event-id="'.$event['id'].'">Se désinscrire</button>';
                }else{
                    echo '<button id="registeration_event" data-event-id="'.$event['id'].'">Je participe <i class="fa fa-check" aria-hidden="true"></i></button>';
                    echo '<button style="display:none;" id="cancel_registeration_event" data-event-id="'.$event['id'].'">Se désinscrire</button>';
                }
            }
        }else{
            echo '<a id="not_connection" href="'.$this->url('security_login').'"><button>Se connecter</button></a>';
        }
        ?>

        <div class="rating"><i class="fa fa-square" aria-hidden="true"></i><i class="fa fa-square" aria-hidden="true"></i><i class="fa fa-square" aria-hidden="true"></i><i class="fa fa-square" aria-hidden="true"></i></div>

    </div>

    <img src="<?= $this->assetUrl('img/default_event.jpg') ?>" alt="<?php echo $event['name']?>">

</div>

<div class="eventview-infos">

    <div class="eventview-organizer">
    par <a href="<?php echo '/YAMATSI/public/user/'.$user['id'] ?>"><?php echo $user['nickname'] ?></a>
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
            echo "<a href=\"/YAMATSI/public/user/".$part['id']."\">".$part['nickname']."</a> ";
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

    <div class="who">
        <h3>Qui participe ?</h3>
        <?php foreach($whoIsRegister as $register){?>
            <a href="<?php echo $this->url('user_profil', ['id' => $register['users_id']])?>"><?php echo $register['nickname'];?></a>
        <?php } ?>
    </div>

</div>

<div class="eventview-comments">

    <h2>Commentaire(s)</h2>
    <?php foreach ($comsFirst as $key => $com){
        if($com['title'] != null){?>
    <div class="comment">
        <h3>Titre : <?php echo $com['title']?></h3>
        <div class="comment-content">
          <p><?php echo $com['message']?></p>
          <p>écrit par : <a href="<?php echo $this->url('user_profil', ['id' => $com['users_id']]) ?>"><?php echo $com['nickname']?></a></p>
        </div>
        <div class="answer">
        <?php if(isset($comsAn[$key])){
            foreach ($comsAn[$key] as $comAnswer){?>
            <div class="answer-content">
            <p><?php echo $comAnswer['message']?></p>
            <p>écrit par : <a href="<?php echo $this->url('user_profil', ['id' => $com['users_id']]) ?>"><?php echo $comAnswer['nickname']?></a></p>
            </div>
        <?php }}?>
        </div>
    </div>
    <?php }}?>

</div>
