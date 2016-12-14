<div>
    <img src="" alt="">
    <h2><?php echo $event['name']?></h2>
    <p>Category: <?php echo $event['category_of'] ?></p>
    <p>Type: <?php echo $type ?></p>
</div>
<div>
    button
    <p>Ratio</p>
</div>
<div>
    <div>
    <a href="<?php echo '/YAMATSI/public/user/'.$event['users_id'] ?>">Assoc/comp</a>
    </div>
    <div>
    <?php foreach ($guests as $guest) {?>
    <a href="<?php echo '/YAMATSI/public/user/'.$guest['id'] ?>"><?php echo $guest['nickname'] ?></a>
    <?php } 
    foreach ($parts as $part) {?>
    <a href="<?php echo '/YAMATSI/public/user/'.$part['id'] ?>"><?php echo $part['nickname'] ?></a>
    <?php }?>
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
    <h2>Commentaire</h2>
    <?php foreach ($coms as $com) {?>
    <div>
        <h3>Titre : <?php echo $com['title']?></h3>
        <p><?php echo $com['message']?></p>
    </div>
    <?php }?>
    <div>
        <h3>Qui participe ?</h3>
        <a href="<?php echo '/YAMATSI/public/user/'.$event['guest_part_id'] ?>">Guest</a>
    </div>
</div>