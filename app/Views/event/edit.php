<?php $this->layout('layout', ['title' => $event['title']]) ?>

<?php $this->start('main_content') ?>

    <h1>Modifier un évènement</h1>

    <form method="post" enctype="multipart/form-data">
        <div class="inputbox">
            <input type="text" name="name" id="name" value="<?php echo $event['name']; ?>" required>
            <label for="name">Nom de l'évènement</label>
        </div>
        <div class="inputbox">
            <input type="text" name="adress" id="adress" value="<?php echo $event['adress']; ?>" required>
            <label for="adress">Adresse</label>
        </div>
        <div class="inputbox">
            <label for="description" class="toplabel">Description de l'évènement</label>
            <textarea name="description" id="description" rows="15"><?php echo $event['message']; ?></textarea>
        </div>

        <div class="inputbox radiobox">
            <label for="category">Catégorie :</label>

            <div class="radiolane">
                <div class="oneradiobox">
                    <input type="radio" id="categoryall" name="category" value="0" <?php echo ($event['category_of'] === '0') ? 'checked' : '' ; ?>> <label for="categoryall">Tout public</label>
                </div>
                <div class="oneradiobox">
                    <input type="radio" id="categorychild" name="category" value="1" <?php echo ($event['category_of'] === '1') ? 'checked' : '' ; ?>> <label for="categorychild">Enfants</label>
                </div>
            </div>
            <div class="radiolane">
                <div class="oneradiobox">
                    <input type="radio" id="categoryteenager" name="category" value="2" <?php echo ($event['category_of'] === '2') ? 'checked' : '' ; ?>> <label for="categoryteenager">Adolescents</label>
                </div>
                <div class="oneradiobox">
                    <input type="radio" id="categoryadult" name="category" value="3" <?php echo ($event['category_of'] === '3') ? 'checked' : '' ; ?>> <label for="categoryadult">Adultes</label>
                </div>
            </div>
        </div>

        <div class="inputbox">
            <select id="type" name="type" size="1">
                <?php
                  foreach ($types as $type)
                  {
                    $selected = ($event['type_id'] == $type['id']) ? 'selected ' : '';
                    echo "<option ".$selected."value=\"".$type['id']."\">".$type['name']."</option> ";
                  }

                ?>
            </select>
        </div>

        <div class="timetable">
            <div id="dateFirst">
              <div class="lane-space-around">
                <label for="hdate1">Date :</label>
                <input type="date" name="hdate1" id="hdate1" value="<?php echo date("Y-m-d", $planning[0][0]); ?>">
              </div>

              <div class="lane-space-around">
                <label for="hstart1">De</label>
                <input type="time" step="1800" id="hstart1" name="hstart1" value="<?php echo date("H:i", $planning[0][0]);?>">

                <label for="hstop1">à</label>
                <input type="time" step="1800" id="hstop1" name="hstop1" value="<?php echo date("H:i", $planning[0][1]);?>">
              </div>
            </div>

            <div id="adddates" class="adddates">
                <p>Votre évènement s'étend sur plusieurs jours ? <i class="fa fa-plus-circle" aria-hidden="true"></i></p>
            </div>

                <!-- Dates intermédiaires -->
            <div id="dateinter" class="dateinter">
                <label>Créneaux intermédiaires</label>
                <?php foreach($planning as $key => $hour){?>
                <?php if($key < count($planning)-1 && $key > 0){?>
                <input type="time" name="hstart<?php echo $key+1 ?>" step="1800" id="hstart<?php echo $key ?>" value="<?php echo date("H:i", $hour[0]); ?>">
                <input type="time" name="hstop<?php echo $key+1 ?>" step="1800" id="hstop<?php echo $key ?>" value="<?php echo date("H:i", $hour[1]); ?>">
                <input type="date" name="hdate<?php echo $key+1 ?>" id="hdate<?php echo $key ?>" value="<?php echo date("Y-m-d", $hour[0]); ?>">
                <div>
                    <hr>
                </div>
                <?php }} ?>
            </div>

            <div id="datesup" class="datesup">
                <?php ?>
                <div>
                    <label for="hstartlast">Créneau de la dernière date</label>
                    <input type="time" name="hstartlast" step="1800" id="hstartlast" value="<?php echo date("H:i", $planning[count($planning)-1][0]);?>">
                    <input type="time" name="hstoplast" step="1800" id="hstoplast" value="<?php echo date("H:i", $planning[count($planning)-1][1]);?>">
                    <input type="date" name="hlastdate" id="hlastdate" value="<?php echo date("Y-m-d", $planning[count($planning)-1][0]); ?>">
                    <div id="lastdate" class="adddates">
                        <p>Valider la derniere date ? <i class="fa fa-check" aria-hidden="true"></i></p>
                    </div>
                </div>
                <?php ?>
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
            <label for="file" class="filetitle">Ajouter des photos <i class="fa fa-file-image-o" aria-hidden="true"></i></label>
            <input name="file" id="eventpic" type="file" class="picfile">
        </div>

        <div class="inputbox">
            <div id="selectguest">
                <?php if($guestpart['guest'] != ''){
                    foreach($guestpart['guest'] as $guest){ ?>
                    <input class="guestpart" type="text" name="partid<?php echo $guest['id']?>" value="<?php echo $guest['nickname']?>" readonly="">
                <?php }} ?>
            </div>
            <input type="text" id="guests">
            <label for="guests">Guest(s) <i class="fa fa-user-o" aria-hidden="true"></i></label>
            <div id="findguest"></div>
        </div>
        <?php $guestpart ?>
        <div class="inputbox">
            <div id="selectpart">
                <?php if($guestpart['part'] != ''){
                    foreach($guestpart['part'] as $part){ ?>
                    <input class="guestpart" type="text" name="partid<?php echo $part['id']?>" value="<?php echo $part['nickname']?>" readonly="">
                <?php }} ?>
            </div>
            <input type="text" id="partners">
            <label for="partners">Partenaire(s) <i class="fa fa-user-o" aria-hidden="true"></i></label>
            <div id="findpart"></div>
        </div>


        <div class="inputbox radiobox bool">
            <label for="comment">Autoriser les commentaires ?</label>
            <div class="oneradiobox comment">
                <input type="radio" name="comment" value="1" id="comment1" <?php echo ($event['comment_autorize'] == 1) ? 'checked' : '' ; ?>>
                <label for="comment1">Oui</label>
            </div>
            <div class="oneradiobox comment">
                <input type="radio" name="comment" value="0" id="commen21" <?php echo ($event['comment_autorize'] == 0) ? 'checked' : '' ; ?>>
                <label for="comment2">Non</label>
            </div>

        </div>
        <input type="submit" name="submitformcreate" value="Créer">

    </form>

<?php $this->stop('main_content') ?>

<?php $this->start('script_content') ?>
<script src="<?= $this->assetUrl('js/jquery-3.1.1.min.js') ?>"></script>
<script src="<?= $this->assetUrl('js/register_create.js') ?>"></script>
<?php $this->stop('script_content') ?>
