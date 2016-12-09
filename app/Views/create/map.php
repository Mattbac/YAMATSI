<?php $this->layout('layoutmap', ['title' => $title]) ?>

<?php $this->start('link_content') ?>
    <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
<?php $this->stop('link_content') ?>

<?php $this->start('main_content') ?>
        <p style="color:black;">Ou souhaitez vous faire votre evenement ?</p>
        <input id="search_city" type="text" name="search_city">
        <div id='result_search'></div>
        <div><a href="">Envoyer la localisation !</a></div>
<?php $this->stop('main_content') ?>

<?php $this->start('script_content') ?>
<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?= $this->assetUrl('js/create_event_map.js') ?>"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHheo_U6zgBrVvqV61I6tMkA40Tkblc7w&callback=initMap"></script>
<?php $this->stop('script_content') ?>