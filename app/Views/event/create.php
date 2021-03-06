<?php $this->layout('layout', ['title' => 'Event edition '.$title]) ?>

<?php $this->start('main_content') ?>

    <h1>Créer un évènement</h1>
    <h2 class="subtitle">Dernière étape</h2>
    <form action="" method="post" enctype="multipart/form-data">

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

            <div class="radiolane">
                <div class="oneradiobox">
                    <input type="radio" id="categoryall" name="category" value="0" checked> <label for="categoryall">Tous publics</label>
                </div>

                <div class="oneradiobox">
                    <input type="radio" id="categorychild" name="category" value="1"> <label for="categorychild">Enfants</label>
                </div>
            </div>

            <div class="radiolane">
                <div class="oneradiobox">
                    <input type="radio" id="categoryteenager" name="category" value="2">
                    <label for="categoryteenager">Adolescents</label>
                </div>

                <div class="oneradiobox">
                    <input type="radio" id="categoryadult" name="category" value="3"> <label for="categoryadult">Adultes</label>
                </div>
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
            <div id="dateFirst">
              <div class="lane-space-around">
                <label for="hdate1">Date :</label>
                <input type="date" name="hdate1" id="hdate1">
              </div>

              <div class="lane-space-around">
                <label for="hstart1">De</label>
                <input type="time" step="1800" id="hstart1" name="hstart1">

                <label for="hstop1">à</label>
                <input type="time" step="1800" id="hstop1" name="hstop1">
              </div>
            </div>

            <div id="adddates" class="adddates">
                <p>Votre évènement s'étend sur plusieurs jours ? <i class="fa fa-plus-circle" aria-hidden="true"></i></p>
            </div>

                <!-- Dates intermédiaires -->
            <div id="dateinter" class="dateinter">

            </div>

            <div id="datesup" class="datesup">

            </div>
        </div>

        <div class="inputbox nbplaces">
                <input type="number" name="places" id="places">
                <label for="places">Nombre de places total <span class="smaller">(non-disponibles incluses)</span></label>

        </div>

        <div class="inputbox">
            <label for="file" class="filetitle">Ajouter des photos <i class="fa fa-file-image-o" aria-hidden="true"></i></label>
            <input name="file" id="eventpic" type="file" class="picfile">
        </div>

        <div class="inputbox">
            <div id="selectguest"></div>
            <input type="text" id="guests">
            <label for="guests">Guest(s) <i class="fa fa-user-o" aria-hidden="true"></i></label>
            <div id="findguest"></div>
        </div>

        <div class="inputbox">
            <div id="selectpart"></div>
            <input type="text" id="partners">
            <label for="partners">Partenaire(s) <i class="fa fa-user-o" aria-hidden="true"></i></label>
            <div id="findpart"></div>
        </div>


        <div class="inputbox radiobox bool">

            <label for="comment">Autoriser les commentaires ?</label>

            <div class="oneradiobox comment">
            <input type="radio" name="comment" value="1" id="comment1" checked>
            <label for="comment1">Oui</label>
            </div>

            <div class="oneradiobox comment">
            <input type="radio" name="comment" value="0" id="commen21">
            <label for="comment2">Non</label>
            </div>

        </div>

        <input class="endform eventcreate" type="submit" name="submitformcreate" value="Créer">

    </form>

<?php $this->stop('main_content') ?>

<?php $this->start('script_content') ?>
<script src="<?= $this->assetUrl('js/jquery-3.1.1.min.js') ?>"></script>
<script src="<?= $this->assetUrl('js/register_create.js') ?>"></script>
<?php $this->stop('script_content') ?>
