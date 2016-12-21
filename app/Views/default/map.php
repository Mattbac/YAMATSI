<?php $this->layout('layoutmap', ['title' => $title]) ?>

<?php $this->start('link_content') ?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.min.css') ?>">
<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
<?php $this->stop('link_content') ?>

<?php $this->start('main_content') ?>

    <section id="header">
        <div class="navbar">
            <select name="category" id="category">
                <option value="null">Tous Publics</option>
                <option value="1">Enfant</option>
                <option value="2">Adolescent</option>
                <option value="3">Adulte</option>
            </select>
            <select name="type" id="type">
                <option value="null">Tous types</option>
                <?php foreach ($type as $value) {
                    if($value['id'] != 1){?>
                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                <?php }
                }?>
            </select>
            <input id="date" name="date" type="date">
            <input id="search_city" type="text" name="search_city" placeholder="Ville et/ou CP...">
        </div>

        <div id='result_search'></div>
    </section>

<?php $this->stop('main_content') ?>

<?php $this->start('script_content') ?>
<script src="<?= $this->assetUrl('js/jquery-3.1.1.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->assetUrl('js/map.js') ?>"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHheo_U6zgBrVvqV61I6tMkA40Tkblc7w&callback=initMap">
</script>
<?php $this->stop('script_content') ?>
