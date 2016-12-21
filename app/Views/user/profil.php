<?php $this->layout('layout', ['title' => 'Page de '.$user['nickname']]) ?>

<?php $this->start('main_content') ?>

<div id="profile">

  <div id="user_information">
      <div class="avatar">
        <img src="<?= $this->assetUrl('img/avatar/'.$user['pictures_profile']) ?>" alt="Avatar de <?= $user['nickname'] ?>">
      </div>
      <div class="info-field">
        <h1><?= $user['nickname'] ?></h1>
        <p><?= $user['email'] ?></p>
        <p><?= $user['message'] ?></p>
      </div>
  </div>
  <div class="content">
      <div id="futur_event">
          <h2>Evènements à venir et en cour</h2>
          <?php foreach($eventsregister as $key => $event){
          if(intval($event['end_of_event']) > (new \DateTime())->getTimestamp()){?>
          <div class="showevent lane-space-between">
              <div class="blocinfo lane-space-between">
                <h3><a href="<?php echo $this->url('event_page', ['id' => $event['id']]);?>"><?php echo  $event['name']; ?></a></h3>
                <p>Type : <?php echo $event['type'] ?></p>
                <p>Catégorie : <?php echo $event['category']  ?></p>
                <p><table>
                    <?php foreach($event['planning'] as $key => $day){
                        if($key == 0 || $key == count($event['planning'])-1){
                          if($key == 0){?>
                                <tr><th colspan="3">Debut de l'event :</th></tr>
                            <?php }else{?>
                                <tr><th colspan="3">Fin de l'event :</th></tr>
                            <?php }?>
                            <tr><td><?php echo date("j-m-Y", $day[0])?></td><td><?php echo date("h\hi", $day[0])?></td><td><?php echo date("h\hi", $day[1])?></td></tr>
                    <?php }} ?>
                </table></p>
              </div>
              <img src="<?= $this->assetUrl('img/default_event.jpg') ?>" alt="">
          </div>
          <?php }}?>
      </div>
  </div>
  <div id="paste_event">
    	<h2>Evènements passés</h2>
      <?php foreach($eventsregister as $key => $event){
          if(intval($event['end_of_event']) < (new \DateTime())->getTimestamp()){?>
          <div class="showevent lane-space-between">
              <div class="blocinfo lane-space-between">
                <h3><a href="<?php echo $this->url('event_page', ['id' => $event['id']]);?>"><?php echo  $event['name']; ?></a></h3>
                <p>Type : <?php echo $event['type'] ?></p>
                <p>Catégorie : <?php echo $event['category']  ?></p>
                <p><table>
                    <?php foreach($event['planning'] as $key => $day){
                        if($key == 0 || $key == count($event['planning'])-1){
                          if($key == 0){?>
                                <tr><th colspan="3">Debut de l'event :</th></tr>
                            <?php }else{?>
                                <tr><th colspan="3">Fin de l'event :</th></tr>
                            <?php }?>
                            <tr><td><?php echo date("j-m-Y", $day[0])?></td><td><?php echo date("h\hi", $day[0])?></td><td><?php echo date("h\hi", $day[1])?></td></tr>
                    <?php }} ?>
                </table></p>
              </div>
              <img src="<?= $this->assetUrl('img/default_event.jpg') ?>" alt="">
          </div>
          <?php }}?>
    </div>
</div>

<?php $this->stop('main_content') ?>
