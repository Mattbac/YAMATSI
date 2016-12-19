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
          <h2>Evènements à venir</h2>
          <?php foreach($eventsFuture as $key => $event){ ?>
          <div class="showevent lane-space-between">
              <div class="blocinfo lane-space-between">
                <h3><a href="<?php echo $this->url('event_page', ['id' => $event['id']]);?>"><?php echo  $event['name']; ?></a></h3>
                <p>Type : <?php echo $event['type_id'] ?></p>
                <p>Catégorie : <?php echo $event['category_of'] ?></p>
                <p>Date(s) : Horaire(s)</p>
              </div>
              <img src="<?= $this->assetUrl('img/default_event.jpg') ?>" alt="">
          </div>
          <?php }?>
      </div>
  </div>
  <div id="paste_event">
    	<h2>Evènements passés</h2>
      <?php foreach($eventsPaste as $key => $event){ ?>
          <div class="showevent lane-space-between">
              <div class="blocinfo lane-space-between">
                <h3><a href="<?php echo $this->url('event_page', ['id' => $event['id']]);?>"><?php echo  $event['name']; ?></a></h3>
                <p>Type : <?php echo $event['type_id'] ?></p>
                <p>Catégorie : <?php echo $event['category_of'] ?></p>
                <p>Date(s) : Horaire(s)</p>
              </div>
              <img src="<?= $this->assetUrl('img/default_event.jpg') ?>" alt="">
          </div>
        <?php }?>
  </div>

</div>

<?php $this->stop('main_content') ?>
