<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Villes_franceModel as Villes_franceModel;
use Model\EventModel as EventModel;

class ApiController extends Controller
{

    // Creation Event Form

    public function search_city($slug)
    {
        $Villes_franceModel = new Villes_franceModel();
        if(is_numeric($slug)){
            echo json_encode($Villes_franceModel->findBySlug(intval($slug), 'ville_code_postal'));
        }else{
            echo json_encode($Villes_franceModel->findBySlug($slug, 'ville_nom_reel'));
        }
    }

    public function search_event()
    {
        $EventModel = new EventModel();

        echo json_encode($EventModel->findAll());
    }
}
