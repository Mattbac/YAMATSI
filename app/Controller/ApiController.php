<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Villes_franceModel as Villes_franceModel;
use Model\EventModel as EventModel;
use Model\CommentModel as CommentModel;
use Model\TypeModel as TypeModel;
use Model\UsersModel as UsersModel;

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
        $CommentModel = new CommentModel();
        $EventModel = new EventModel();
        $TypeModel = new TypeModel();
        $UsersModel = new UsersModel();

        $element['event']           = $EventModel->find($id);
        $element['com']             = $CommentModel->findAllComWithId($id);
        $element['type']            = $TypeModel->find($element['event']['type_id']);
        $element['guest_part']      = $UsersModel->findGuestPart($element['event']['guest_part_id']);

        file_put_contents('test.txt', json_encode($element['event']['guest_part_id']));

        $this->show('default/event_map', [  'event'     => $element['event'],
                                            'coms'      => $element['com'],
                                            'guests'     => $element['guest_part']['guest'],
                                            'parts'      => $element['guest_part']['part'],
                                            'type'      => $element['type']['name']]);
    }
}
