<?php

namespace Controller;

use \W\Controller\Controller;

class CreateController extends Controller
{

    // Creation Event Form
    public function event()
    {
        if(isset($_POST['submitformcreate'])){

        }
        
        $this->show('default/home', ['title' => 'create event']);
    }

}