<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

<section>
    <h1>Créer un évènement - Etape 2</h1>
</section>
<hr>
<section>
    <form action="" method="post">
       
        <label for="name">Nom de l'évènement</label>
        <input type="text" name="name" id="name">
        
        <label for="adress">Adresse</label>
        <input type="text" name="adress" id="adress">
        
        <label for="description">Description de l'évènement</label>
        <textarea name="description" id="description"></textarea>
        
        <label for="category">Catégorie :</label>
        <input type="radio" id="category" name="category" value="all" checked> Tout public
        <input type="radio" name="category" value="child"> Enfants
        <input type="radio" name="category" value="teenager"> Adolescents
        <input type="radio" name="category" value="adult"> Adultes
        
        <label for="type">Type :</label>
        <select id="type" name="type" size="1">
            <option value="1">Danse</option>
            <option value="2">Loisir</option>
            <option value="3">Musique</option>
            <option value="4">Peinture</option>
            <option value="5">Promenade</option>
            <option value="6">Sport</option>
        </select>
        
        <label for="start1">Horaire de début</label>
        <input type="time" step="1800" id="start1">
        <label for="stop1">Horaire de fin</label>
        <input type="time" step="1800" id="stop1">
        <label for="date">Date :</label>
        <input type="date" name="date">
        
        <button>Votre évènement s'étend sur plusieurs jours ?</button>
        
        <div>
            <!-- Dates intermédiaires -->
        </div>
                        
        <div>
            <label for="laststart">Horaire de début</label>
            <input type="time" step="1800" id="laststart">
            <label for="laststop">Horaire de fin</label>
            <input type="time" step="1800" id="laststop">
            <label for="lastdate">Dernière date :</label>
            <input type="date" name="lastdate">
        </div>
        
        <label for="limits">Places limitées ?</label>
        <input type="radio" value="1"> Oui
        <input type="radio" value="0" id="limits"> Non
        <label for="places">Nombre de places total (non-disponibles incluses)</label>
        <input type="number" name="places" id="places">
        
        <label for="pic">Ajouter des photos :</label>
        <input name="pic" id="pic" type="file">
        
        <label for="guests">Guest(s)</label>
        <input type="text" name="guests" id="guests">
        
        <label for="partners">Partenaire(s)</label>
        <input type="text" name="partners" id="partners">
        
        <label for="comment">Autoriser les commentaires ?</label>
        <input type="radio" name="comment" value="1" checked id="comment"> Oui
        <input type="radio" name="comment" value="0"> Non
        
        <input type="submit" name="submitformcreate" value="Créer">
        
    </form>
</section>

<?php $this->stop('main_content') ?>


