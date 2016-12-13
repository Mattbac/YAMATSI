<?php

namespace Controller;

use \W\Controller\Controller;

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

        }

        $this->show('event/create', ['title' => 'OutLooker - Créer un évènement', 'lat' => $lat, 'lng' => $lng]);
    }

    public function map()
    {
        $this->show('event/map', ['title' => 'create map']);
    }

}
