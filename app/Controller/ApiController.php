<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Villes_franceModel as Villes_franceModel;

class ApiController extends Controller
{

    // Creation Event Form

    public function search_city($slug)
    {
        $Villes_franceModel = new Villes_franceModel();

        echo json_encode($Villes_franceModel->findBySlug($slug));
    }
}
