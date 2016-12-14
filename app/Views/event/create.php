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
            <label for="description" class="toplabel">Description de l'évènement</label>
            <textarea name="description" id="description" rows="15"></textarea>
        </div>

        <div class="inputbox radiobox">



            <label for="category">Catégorie :</label>

            <div class="oneradiobox">
                <input type="radio" id="categoryall" name="category" value="0" checked> <label for="categoryall">Tout public</label>
            </div>

            <div class="oneradiobox">
                <input type="radio" id="categorychild" name="category" value="1"> <label for="categorychild">Enfants</label>
            </div>

            <div class="oneradiobox">
                <input type="radio" id="categoryteenager" name="category" value="2">
                <label for="categoryteenager">Adolescents</label>
            </div>

            <div class="oneradiobox">
                <input type="radio" id="categoryadult" name="category" value="3"> <label for="categoryadult">Adultes</label>
            </div>
        </div>

        <div class="inputbox">
            <select id="type" name="type" size="1">

                <?php
                  foreach ($types as $type)
                  {
                    echo "<option value=\"".$type['id']."\">".$type['name']."</option> ";
                  }

                ?>
            </select>
        </div>

        <div class="timetable">
            <div class="inputbox">
                <label for="start1">Horaire de début</label>
                <input type="time" step="1800" id="start1">
            </div>

            <div class="inputbox">
                <label for="stop1">Horaire de fin</label>
                <input type="time" step="1800" id="stop1">
            </div>

            <div class="inputbox">
                <label for="date">Date :</label>
                <input type="date" name="date">
            </div>


            <div class="adddates">
                <p>Votre évènement s'étend sur plusieurs jours ?</p>
            </div>

                <!-- Dates intermédiaires -->

            <div class="datesup">
                <div class="inputbox">
                <label for="laststart">Horaire de début</label>
                <input type="time" step="1800" id="laststart">
                </div>

                <div class="inputbox">
                <label for="laststop">Horaire de fin</label>
                <input type="time" step="1800" id="laststop">
                </div>

                <div class="inputbox">
                <label for="lastdate">Dernière date :</label>
                <input type="date" name="lastdate">
                </div>
            </div>
        </div>

        <div class="inputbox radiobox bool">
                <label for="limits">Places limitées ?</label>

                <div class="oneradiobox">
                <input type="radio" id="limit1" name="limits" value="1">
                <label for="limit1">Oui</label>
                </div>

                <div class="oneradiobox">
                <input type="radio" id="limit0" name="limits" value="0">
                <label for="limit0">Non</label>
                </div>
        </div>

        <div class="inputbox nbplaces">
                <input type="number" name="places" id="places">
                <label for="places">Nombre de places total <span class="smaller">(non-disponibles incluses)</span></label>

        </div>

        <div class="inputbox">
            <label for="eventpic" class="filetitle">Ajouter des photos <i class="fa fa-file-image-o" aria-hidden="true"></i></label>
            <input name="eventpic" id="eventpic" type="file" class="picfile">
        </div>

        <div class="inputbox">
            <input type="text" name="guests" id="guests">
            <label for="guests">Guest(s) <i class="fa fa-user-o" aria-hidden="true"></i></label>
        </div>

        <div class="inputbox">
            <input type="text" name="partners" id="partners">
            <label for="partners">Partenaire(s) <i class="fa fa-user-o" aria-hidden="true"></i></label>
        </div>


        <div class="inputbox radiobox bool">

            <label for="comment">Autoriser les commentaires ?</label>

            <div class="oneradiobox">
            <input type="radio" name="comment" value="1" checked id="comment1">
            <label for="comment1">Oui</label>
            </div>

            <div class="oneradiobox">
            <input type="radio" name="comment" value="0">
            <label for="comment2">Non</label>
            </div>

        </div>

        <input type="submit" name="submitformcreate" value="Créer">

    </form>

<?php $this->stop('main_content') ?>
