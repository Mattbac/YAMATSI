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
  function post($param)
  {
    return strip_tags(trim($_POST[$param]));
  }
    // Creation Event Form

    public function page($id)
    {
        $element = [];
        $commentModel             = new CommentModel();
        $eventModel               = new EventModel();
        $typeModel                = new TypeModel();
        $usersModel               = new UsersModel();
        $register_eventModel      = new Register_eventModel();

        $element['event']           			  = $eventModel->find($id);
        if($element['event']){
          $element['user']                  = $usersModel->find($element['event']['users_id']);
          $element['com']             		  = $commentModel->findAllComWithId($id);
          $element['type']            		  = $typeModel->find($element['event']['type_id']);
          $element['whoIsRegister']         = $register_eventModel->findAllRegister($id);
          $element['category']            	=   ($element['event']['category_of'] == 1) ? 'Enfant' :
                                                (($element['event']['category_of'] == 2) ? 'Adolescent' :
                                                (($element['event']['category_of'] == 3) ? 'Adulte' : 'Tout public'));
          $element['id_user_connect']       = $this->getUser()['id'];
          $element['is_connect']            = !empty($this->getUser()['id']);
          $element['planning']              = unserialize($element['event']['date_time']);

          if($element['is_connect']){
            $element['is_register_event']   = !empty($register_eventModel->isAllreadyRegister($this->getUser()['id'], $id));
          }else{
            $element['is_register_event'] = null;
          }

          if($element['event']['guest_part_id'] != ''){
            $element['guest_part']      	= unserialize($element['event']['guest_part_id']);
          }else{
            $element['guest_part'] 			= ['guest' => '', 'part' => ''];
          }

          $this->show('event/page', [ 'is_connect'			    => $element['is_connect'],
                                      'is_register_event'		=> $element['is_register_event'],
                                      'whoIsRegister'		    => $element['whoIsRegister'],
                                      'user'		            => $element['user'],
                                      'event'     			    => $element['event'],
                                      'planning'     			  => $element['planning'],
                                      'id_user_connect'     => $element['id_user_connect'],
                                      'category'     			  => $element['category'],
                                      'comsFirst'      			=> $element['com'][1],
                                      'comsAn'      			  => $element['com'][2],
                                      'guests'    			    => $element['guest_part']['guest'],
                                      'parts'     			    => $element['guest_part']['part'],
                                      'type'      			    => ($element['type']['name'] != '') ? $element['type']['name'] :'Tout type']);

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
      if(isset($this->getUser()['id'])){
        if($this->getUser()['type'] != 'user'){
        if(isset($_POST['submitformcreate'])){// if the form is send // && is_numeric($lat) && is_numeric($lng)
          $event = new EventModel();

          if(!is_dir("assets/img/upload")){
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
            $i = 1;
            $tab = [];

          while(isset($_POST['hstart'.$i]))
            {
              if($this->post('hdate'.$i) == NULL || $this->post('hstart'.$i) == NULL || $this->post('hstop'.$i)== NULL)
              {
                $i++;
              }else{
                $dateStart = new \DateTime($this->post('hdate'.$i).' '.$this->post('hstart'.$i));
                $dateStop = new \DateTime($this->post('hdate'.$i).' '.$this->post('hstop'.$i));
                $tabDate = [$dateStart->getTimestamp(), $dateStop->getTimestamp()];
                $tab[] = $tabDate;
                $i++;
              }
            }
            if(isset($_POST['hlastdate']))
            {
              $dateStart = new \DateTime($this->post('hlastdate').' '.$this->post('hstartlast'));
              $dateStop = new \DateTime($this->post('hlastdate').' '.$this->post('hstoplast'));
              $tabDate = [$dateStart->getTimestamp(), $dateStop->getTimestamp()];
              $tab[] = $tabDate;
            }else{
              echo "Fatal error";
            }
            $tabguest = [];
            $tabpart = [];
            $tabguest = [];
            foreach ($_POST as $key => $value) {
                if(substr($key,0,6) == 'partid'){
                    $tabpart[] = ['id' => explode('partid', $key)[1], 'nickname' => $value];
                }
                if(substr($key,0,7) == 'guestid'){
                    $tabguest[] = ['id' => explode('guestid', $key)[1], 'nickname' => $value];
                }
            }
            $datas = [
              'name'             => $this->post('name'),
              'adress'           => $this->post('adress'),
              'message'          => $this->post('description'),
              'category_of'      => $this->post('category'),
              'type_id'          => $this->post('type'),
              'date_time'        => serialize($tab),
              'end_of_event'     => ((isset($_POST['hlastdate'])) ? $this->post('hlastdate') : $this->post('hdate1')),
              'start_of_event'   => $this->post('hdate1'),
              'comment_autorize' => $this->post('comment'),

              'guest_part_id'    => serialize(['guest' => ((!empty($tabguest)) ? $tabguest : '' ), 'part' => ((!empty($tabpart)) ? $tabpart : '' )]),

              'coor_lat'         => $lat,
              'coor_lng'         => $lng,
              'users_id'         => $this->getUser()['id']
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
      else{
        $this->redirectToRoute('user_profil');
      }
    }
      else{
          $this->redirectToRoute('user_register');
      }
    }

    public function map()
    {
        $this->show('event/map', ['title' => 'create map']);
    }

}
