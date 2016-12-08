<?php

namespace Controller;

use \W\Controller\Controller;

class CreateController extends Controller
{

    // Creation Event Form

    public function map()
    {
        $this->show('create/map', ['title' => 'create map']);
    }

    public function event($lat, $lng)
    {
        if(isset($_POST['submitformcreate'])){// if the form is send

        }
        
        $this->show('create/event', ['title' => 'create event']);
    }

}