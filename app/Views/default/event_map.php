<div>
    <img src="" alt="">
    <h2><?php echo $event['name']?></h2>
    <p>Category: Tout public</p>
    <p>Type: Musique</p>
</div>
<div>
    <p><?php echo $event['message']?></p>
    <p>horraire :</p>
    <table>
        <tr><td>Lundi</td><td>8h30</td><td>19h</td></tr>
        <tr><td>Mardi</td><td>9h</td><td>21h</td></tr>
    </table>
    <p>Adresse : 5 avenue du pré au lard</p>
</div>
<div>
    <h2>Commentaire</h2>
    <?php foreach ($coms as $com) {?>
    <div>
        <h3>Titre : <?php echo $com['title']?></h3>
        <p><?php echo $com['message']?></p>
    </div>
    <?php }?>
</div>