<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

    <h1>Créer un évènement</h1>
    <h2 class="subtitle">Dernière étape</h2>

    <form action="" method="post">
       
        <div class="inputbox">
            <input type="text" name="name" id="name" required>
            <label for="name">Nom de l'évènement</label>
        </div>
        
        <div class="inputbox">
            <input type="text" name="adress" id="adress" required>
            <label for="adress">Adresse</label>
        </div>
        
        <div class="inputbox">
            <textarea name="description" id="description" required></textarea>
            <label for="description">Description de l'évènement</label>
        </div>
        
        <div class="inputbox">
            <label for="category">Catégorie :</label>
            <input type="radio" id="category" name="category" value="all" checked> Tout public
            <input type="radio" name="category" value="child"> Enfants
            <input type="radio" name="category" value="teenager"> Adolescents
            <input type="radio" name="category" value="adult"> Adultes
        </div>
        
        <div class="inputbox">
            <select id="type" name="type" size="1">
                <option value="">Type d'évènement ?</option>
                <option value="1">Danse</option>
                <option value="2">Loisir</option>
                <option value="3">Musique</option>
                <option value="4">Peinture</option>
                <option value="5">Promenade</option>
                <option value="6">Sport</option>
            </select>
        </div>
        
        <div class="inputbox timetable">
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
        </div>
        
        <div class="inputbox">
            <label for="limits">Places limitées ?</label>
            <input type="radio" value="1"> Oui
            <input type="radio" value="0" id="limits"> Non
            <label for="places">Nombre de places total (non-disponibles incluses)</label>
            <input type="number" name="places" id="places">
        </div>
        
        <div class="inputbox">
            <label for="eventpic">Ajouter des photos :</label>
            <input name="eventpic" id="eventpic" type="file" class="picfile">
        </div>
        
        <div class="inputbox">
            <input type="text" name="guests" id="guests">
            <label for="guests">Guest(s)</label>
        </div>
        
        <div class="inputbox">
            <input type="text" name="partners" id="partners">
            <label for="partners">Partenaire(s)</label>
        </div>
        
        <div class="inputbox">
            <label for="comment">Autoriser les commentaires ?</label>
            <input type="radio" name="comment" value="1" checked id="comment"> Oui
            <input type="radio" name="comment" value="0"> Non
        </div>
        
        <input type="submit" name="submitformcreate" value="Créer">
        
    </form>

<?php $this->stop('main_content') ?>


