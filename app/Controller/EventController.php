<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\EventModel as EventModel;
use \Model\TypeModel as TypeModel;
use \Model\CommentModel as CommentModel;
use \Model\UsersModel as UsersModel;
use \Model\Register_eventModel as Register_eventModel;

class EventController extends Controller
{

    // Creation Event Form

    public function page($id)
    {
        $element = [];
        $commentModel = new CommentModel();
        $eventModel = new EventModel();
        $typeModel = new TypeModel();
        $usersModel = new UsersModel();
        $register_eventModel = new Register_eventModel();

        $element['event']           			= $eventModel->find($id);
		if($element['event']){
			
			$element['com']             		= $commentModel->findAllComWithId($id);
			$element['type']            		= $typeModel->find($element['event']['type_id']);
			$element['is_connect']          	= !empty($this->getUser()['id']);

			if($element['is_connect']){
				$element['is_register_event']   = !empty($register_eventModel->isAllreadyRegister($this->getUser()['id'], $id));
			}

			if($element['event']['guest_part_id'] != ''){
				$element['guest_part']      	= $usersModel->findGuestPart($element['event']['guest_part_id']);
			}else{
				$element['guest_part'] 			= ['guest' => '', 'part' => ''];
			}
			
			$this->show('event/page', [ 'is_connect'			=> $element['is_connect'],
										'is_register_event'		=> $element['is_register_event'],
										'event'     			    => $element['event'], 
										'comsFirst'      			=> $element['com'][1],
										'comsAn'      			  => $element['com'][2],
										'guests'    			    => $element['guest_part']['guest'],
										'parts'     			    => $element['guest_part']['part'],
										'type'      			    => $element['type']['name']]);

		}else{
			$this->showNotFound();
		}
    }

    public function edit($id = 0)
    {
		$eventModel = new EventModel();
		$event = $eventModel->find($id);

		if($id != 0 && $this->getUser()['id'] == $event['users_id']){
			if(isset($_POST['submitformcreate']))
			{

			}
			$typesModel = new TypeModel();
			$type = $typesModel->findAll();
			var_dump($event);
			$this->show('event/edit', ['event' => $event, 'types' => $type]);

		}elseif($id != 0){
			$this->redirectToRoute('event_page', ['id' => $id]);

		}else{
			$this->redirectToRoute('default_map');
		}
    }

    public function create($lat, $lng)
    {
        if(isset($_POST['submitformcreate'])){// if the form is send // && is_numeric($lat) && is_numeric($lng)
          $event = new EventModel();
          var_dump($_POST);

          if(!is_dir("upload")){
            mkdir("assets/img/upload");
          }

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
