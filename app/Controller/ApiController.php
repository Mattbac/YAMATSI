<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Villes_franceModel as Villes_franceModel;
use Model\EventModel as EventModel;
use Model\CommentModel as CommentModel;
use Model\TypeModel as TypeModel;
use Model\UsersModel as UsersModel;
use Model\Register_eventModel as Register_eventModel;

class ApiController extends Controller
{
  function post($param)
  {
    return strip_tags(trim($_POST[$param]));
  }
    // Creation Event Form
    public function search_guest($slug)
    {
        $UsersModel = new UsersModel();

        $array = ["%20",",","|",":",".","+","-","*","/"];
        $slug = str_replace($array, $array[0], $slug);
        $slug = explode($array[0], $slug);

        echo json_encode($UsersModel->findUserBySlug($slug));
    }

    public function search_part($slug)
    {
        $UsersModel = new UsersModel();

        $array = ["%20",",","|",":",".","+","-","*","/"];
        $slug = str_replace($array, $array[0], $slug);
        $slug = explode($array[0], $slug);

        echo json_encode($UsersModel->findPartBySlug($slug));
    }

    public function search_city($slug)
    {
        $Villes_franceModel = new Villes_franceModel();

        $array = ["%20",",","|",":",".","+","-","*","/"];
        $slug = str_replace($array, $array[0], $slug);
        $slug = explode($array[0], $slug);

        echo json_encode($Villes_franceModel->findBySlug($slug));
    }

    public function search_event()
    {
        $EventModel = new EventModel();

        echo json_encode($EventModel->findAll());
    }

    public function search_event_element($id)
    {
        $element = [];
        $commentModel               = new CommentModel();
        $eventModel                 = new EventModel();
        $typeModel                  = new TypeModel();
        $usersModel                 = new UsersModel();
        $register_eventModel        = new Register_eventModel();

        $element['event']                   = $eventModel->find($id);
        $element['user']                    = $usersModel->find($element['event']['users_id']);
        $element['com']             		= $commentModel->findAllComWithId($id);
        $element['type']            		= $typeModel->find($element['event']['type_id']);
        $element['whoIsRegister']           = $register_eventModel->findAllRegister($id);
        $element['category']            	=   ($element['event']['category_of'] == 1) ? 'Enfant' :
                                                (($element['event']['category_of'] == 2) ? 'Adolescent' :
                                                (($element['event']['category_of'] == 3) ? 'Adulte' : 'Tout public'));
        $element['is_connect']          	= !empty($this->getUser()['id']);

        if($element['is_connect']){
            $element['is_register_event']   = !empty($register_eventModel->isAllreadyRegister($this->getUser()['id'], $id));
        }else{
            $element['is_register_event'] = null;
        }

        if($element['event']['guest_part_id'] != ''){
            $element['guest_part']      	= $usersModel->findGuestPart($element['event']['guest_part_id']);
        }else{
            $element['guest_part'] 			= ['guest' => '', 'part' => ''];
        }

        $this->show('default/event_map', [  'is_connect'	            => $element['is_connect'],
                                            'is_register_event'		    => $element['is_register_event'],
                                            'whoIsRegister'		        => $element['whoIsRegister'],
                                            'user'		                => $element['user'],
                                            'event'     			    => $element['event'],
                                            'category'     			    => $element['category'],
                                            'comsFirst'      			=> $element['com'][1],
                                            'comsAn'      			    => $element['com'][2],
                                            'guests'    			    => $element['guest_part']['guest'],
                                            'parts'     			    => $element['guest_part']['part'],
                                            'type'      			    => ($element['type']['name'] != '') ? $element['type']['name'] :'Tout type']);
    }

    public function send_com()
    {
        $commentModel = new CommentModel();

        if(isset($_POST['title']) && isset($_POST['message']) && isset($_POST['event_id']) && isset($this->getUser()['id'])){
            if($this->post('title') != '' && $this->post('message') != ''){
                $commentModel->insert([ 'users_id'      => $this->getUser()['id'],
                                        'event_id'      => $this->post('event_id'),
                                        'message'       => $this->post('message'),
                                        'created_at'    => time(),
                                        'title'         => $this->post('title')]);
                echo true;
            }else{
                echo false;
            }
        }elseif(isset($_POST['com_id']) && isset($_POST['message']) && isset($_POST['event_id']) && isset($this->getUser()['id'])){
            if($this->post('message') != ''){
                $commentModel->insert([ 'users_id'      => $this->getUser()['id'],
                                        'event_id'      => $this->post('event_id'),
                                        'comment_id'    => $this->post('com_id'),
                                        'message'       => $this->post('message'),
                                        'created_at'    => time()]);

            echo true;
            }else{
                echo false;
            }
        }else{
            echo false;
        }
    }

    public function edit_com()
    {
      //$this->getUser()['id'] doit egal a l'id 'users_id' qui est lauteur


    }
    public function register_event()
    {
        $register_eventModel = new Register_eventModel();
        if(isset($_POST['eventid']) && isset($this->getUser()['id'])){

            if(empty($register_eventModel->isAllreadyRegister($this->getUser()['id'], $this->post('eventid')))){
                $register_eventModel->insert(['users_id' => $this->getUser()['id'], 'event_id' => $this->post('eventid'), 'date_time' => time()]);
                echo true;
            }else{
                echo false;
            }
        }else{
            echo false;
        }
    }

    public function cancel_registeration_event()
    {
        $register_eventModel = new Register_eventModel();
        if(isset($_POST['eventid']) && isset($this->getUser()['id'])){

            if(!empty($register_eventModel->isAllreadyRegister($this->getUser()['id'],  $this->post('eventid')))){
                $register_eventModel->cancel_register($this->getUser()['id'],  $this->post('eventid'));
                echo true;
            }else{
                echo false;
            }
        }else{
            echo false;
        }
    }
}
