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

    // Creation Event Form

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
			
		$this->show('default/event_map', ['is_connect'		=> $element['is_connect'],
										'is_register_event'	=> $element['is_register_event'],
										'event'     		=> $element['event'], 
										'coms'      		=> $element['com'],
										'guests'    		=> $element['guest_part']['guest'],
										'parts'     		=> $element['guest_part']['part'],
										'type'      		=> $element['type']['name']]);
    }

    public function send_com()
    {
        $commentModel = new CommentModel();

        if(isset($_POST['title']) && isset($_POST['message']) && isset($_POST['event_id']) && isset($this->getUser()['id'])){

            $commentModel->insert([ 'users_id'      => $this->getUser()['id'],
                                    'event_id'      => $_POST['event_id'],
                                    'message'       => $_POST['message'],
                                    'created_at'    => time(),
                                    'title'         => $_POST['title']]);
            echo true;
        }elseif(isset($_POST['com_id']) && isset($_POST['message']) && isset($_POST['event_id']) && isset($this->getUser()['id'])){

            $commentModel->insert([ 'users_id'      => $this->getUser()['id'],
                                    'event_id'      => $_POST['event_id'],
                                    'comment_id'    => $_POST['com_id'],
                                    'message'       => $_POST['message'],
                                    'created_at'    => time()]);
            echo true;
        }else{
            echo false;
        }
    }

    public function register_event()
    {
        $register_eventModel = new Register_eventModel();
        if(isset($_POST['eventid']) && isset($this->getUser()['id'])){

            if(empty($register_eventModel->isAllreadyRegister($this->getUser()['id'], $_POST['eventid']))){
                $register_eventModel->insert(['users_id' => $this->getUser()['id'], 'event_id' => $_POST['eventid']]);
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

            if(!empty($register_eventModel->isAllreadyRegister($this->getUser()['id'], $_POST['eventid']))){
                $register_eventModel->cancel_register($this->getUser()['id'], $_POST['eventid']);
                echo 'true';
            }else{
                echo 'false';
            }
        }else{
            echo 'false';
        }
    }
}
