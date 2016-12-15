<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\EventModel as EventModel;
use \Model\TypeModel as TypeModel;
class EventController extends Controller
{

    // Creation Event Form

    public function page($id = 0)
    {
        $this->show('event/page', ['title' => 'page event '.$id]);
    }

    public function edit($id=0)
    {
        if(isset($_POST['submitformcreate']))
        {
        }
        $eventModel = new EventModel();
        $typesModel = new TypeModel();
        $type = $typesModel->findAll();
        $event = $eventModel->find($id);
        var_dump($event);
        $this->show('event/edit', ['event' => $event, 'types' => $type]);
    }

    public function create($lat, $lng)
    {
        if(isset($_POST['submitformcreate'])){// if the form is send // && is_numeric($lat) && is_numeric($lng)
          $event = new Event();
          var_dump($_POST);
          $extensions = ["image/png", "image/gif", "image/jpg", "image/jpeg"];

          /* ### CLASSE LES AVATARS PAR USER ### */
          if (isset($_FILES['file']))
            {
              if(in_array($_FILES['file']['type'], $extensions))
                {
                  move_uploaded_file($_FILES['file']['tmp_name'],"assets/img/upload/".$_FILES['file']['name']);
                }
                if($_FILES['file']['name'] == "")
                {
                    // RIEN SI AUCUN FICHIER CHARGE
                }
                else
                {
                  $avatar = '';
                }

            $datas = [
              'name'             => $_POST['name'],
              'adress'           => $_POST['adress'],
              'message'          => $_POST['description'],
              'category_of'      => $_POST['category'],
              'type_id'          => $_POST['type'],
              'date_time'        => '549841', // matt ICIIIIIIIII
              'comment_autorize' => $_POST['comment'],
              'guest_part_id'    => '1', // matt ICIIIIIIIII
              'coor_lat'         => $lat,
              'coor_lng'         => $lng,
              'users_id'         => '1' // matt ICIIIIIIIII

            ];

            if (isset($_FILES['file']))
            {
              $datas['picture_first'] = $_FILES['file']['name'];
            }

            $event->insert($datas);
        }
      }
        $types = new TypeModel();
        $arrayType = $types->findAll();
        $this->show('event/create', ['title' => 'OutLooker - Créer un évènement', 'lat' => $lat, 'lng' => $lng, 'types' => $arrayType]);
    }



    public function map()
    {
        $this->show('event/map', ['title' => 'create map']);
    }

}
