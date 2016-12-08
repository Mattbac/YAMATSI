<?php

namespace Controller;

use \W\Controller\Controller;

class PageController extends Controller
{

    // Page User
    public function user($id = 0)
    {

        $this->show('default/home', ['title' => 'page user '.$id]);
    }

    // Page Assoc
    public function assoc($id = 0)
    {
        $this->show('default/home', ['title' => 'page assoc '.$id]);
    }

    // Page Company
    public function company($id = 0)
    {
        $this->show('default/home', ['title' => 'page company '.$id]);
    }

    // Page Event
    public function event($id = 0)
    {
        $this->show('default/home', ['title' => 'page event '.$id]);
    }

}