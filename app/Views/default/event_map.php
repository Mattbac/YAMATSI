<button class="cancelling-cross">
    <i class="fa fa-times" aria-hidden="true"></i>
</button>

<div class="eventview-header">

    <h1><?php echo $event['name']?></h1>
    <p>Catégorie: <strong><?php echo $event['category_of'] ?></strong></p>
    <p>Type: <strong><?php echo $type ?></strong></p>

    <div class="eventview-interact">

        <button>Je participe <i class="fa fa-check" aria-hidden="true"></i></button>
        <button class="hidden">Je n'y participe plus <i class="fa fa-times" aria-hidden="true"></i></button>
        <div class="rating"><i class="fa fa-square" aria-hidden="true"></i><i class="fa fa-square" aria-hidden="true"></i><i class="fa fa-square" aria-hidden="true"></i><i class="fa fa-square" aria-hidden="true"></i></div>

    </div>

    <img src="<?= $this->assetUrl('img/eventsample.jpg') ?>" alt="<?php echo $event['name']?>">

</div>

<div class="eventview-infos">

    <div class="eventview-organizer">
    par <a href="<?php echo '/YAMATSI/public/user/'.$event['users_id'] ?>"></a>
    </div>
    <div class="eventview-guests">
    <?php
    if($guests != ''){
        foreach ($guests as $guest) {
            echo "<a href=\"/YAMATSI/public/user/".$guest['id']."\">".$guest['nickname']."</a>";
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

    <div class="eventview-text">

        <p><?php echo $event['message'] ?></p>
        <p>Horaires :</p>
        <table>
            <tr><td>Lundi</td><td>8h30</td><td>19h</td></tr>
            <tr><td>Mardi</td><td>9h</td><td>21h</td></tr>
        </table>
        <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $event['adress']?></p>

    </div>

    <div class="who">
        <h3>Qui participe ?</h3>
        <a href="<?php echo '/YAMATSI/public/user/'.$event['guest_part_id'] ?>"></a>
    </div>

</div>

<div class="eventview-comments">

    <h2>Commentaire(s)</h2>

    <?php foreach ($coms as $com) {?>

    <div class="comment">
        <h3>Titre : <?php echo $com['title']?></h3>
        <p><?php echo $com['message']?></p>
        <p>Auteur : <a href="<?php echo $this->url('user_profil', ['id' => $com['users_id']]) ?>"><?php echo $com['nickname']?></a></p>
    </div>

    <?php }?>

</div>
