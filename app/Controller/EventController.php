<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\EventModel as Event;
use \Model\TypeModel as Type;
class EventController extends Controller
{

    // Creation Event Form

    public function page($id = 0)
    {
        $this->show('event/page', ['title' => 'page event '.$id]);
    }

    public function edit($id = 0)
    {
         $this->show('event/edit', ['title' => 'edit event'.$id]);
    }






    public function create($lat, $lng)
    {
        if(isset($_POST['submitformcreate'])){// if the form is send
          $event = new Event();
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
              'name'          => $_POST['name'],
              'message'       => $_POST['description'],
            ];

            if (isset($_FILES['file']))
            {
              $datas['pictures_picture_first'] = $_FILES['file']['name'];
            }
            $user->insert($datas);

        }
      }
        $types = new Type();
        $arrayType = $types->findAll();
        $this->show('event/create', ['title' => 'OutLooker - Créer un évènement', 'lat' => $lat, 'lng' => $lng, 'types' => $arrayType]);
    }



    public function map()
    {
        $this->show('event/map', ['title' => 'create map']);
    }

}
