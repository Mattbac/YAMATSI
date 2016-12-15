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

        $element['event']           = $eventModel->find($id);
        $element['com']             = $commentModel->findAllComWithId($id);
        $element['type']            = $typeModel->find($element['event']['type_id']);
        $element['willcome']        = $register_eventModel->find($id);

        if($element['event']['guest_part_id'] != ''){
            $element['guest_part']      = $usersModel->findGuestPart($element['event']['guest_part_id']);
        }else{
            $element['guest_part'] = ['guest' => '', 'part' => ''];
        }

        $this->show('default/event_map', [  'event'     => $element['event'], 
                                            'coms'      => $element['com'],
                                            'guests'    => $element['guest_part']['guest'],
                                            'parts'     => $element['guest_part']['part'],
                                            'willcome'  => $element['willcome'],
                                            'type'      => $element['type']['name']]);
    }

    public function register_com()
    {
        $commentModel = new CommentModel();

        if(isset($_POST)){
            $commentModel->insert(['']);
        }
    }

    public function register_event()
    {
        file_put_contents('text.txt', json_encode($_POST));

        $register_eventModel = new Register_eventModel();
        if(isset($_POST['eventid']) && isset($this->getUser()['id'])){

            if($register_eventModel->isAllreadyRegister($this->getUser()['id'], $_POST['eventid'])){
                $register_eventModel->insert(['users_id' => $this->getUser()['id'], 'event_id' => $_POST['eventid']]);
                echo 'true';
            }else{
                echo 'false';
            }
        }else{
            echo 'false';
        }
    }
}
