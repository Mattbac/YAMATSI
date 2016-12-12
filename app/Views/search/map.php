<?php $this->layout('layoutmap', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
        <select name="category" id="category">
            <option value="0">Tout Public</option>
            <option value="1">Enfant</option>
            <option value="2">Adolescent</option>
            <option value="3">Adulte</option>
        </select>
        <select name="type" id="type">
            <option value="0">Musique</option>
            <option value="1">Dance</option>
            <option value="2">Festival</option>
            <option value="3">Sport</option>
            <option value="4">Brocante</option>
            <option value="5">Exposition</option>
            <option value="6">Cirque</option>
        </select>
        <input type="date">
        <input id="search_city" type="text" name="search_city">
        <div id='result_search'></div>
        
<?php $this->stop('main_content') ?>

<?php $this->start('script_content') ?>
<script src="<?= $this->assetUrl('js/jquery-3.1.1.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->assetUrl('js/map.js') ?>"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHheo_U6zgBrVvqV61I6tMkA40Tkblc7w&callback=initMap">
</script>
<?php $this->stop('script_content') ?>
