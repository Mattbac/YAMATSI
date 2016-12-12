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
        <input type="text" name="search" placeholder="Dans quelle ville ?">
        
<?php $this->stop('main_content') ?>
