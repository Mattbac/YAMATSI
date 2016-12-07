<?php

namespace Controller;

use \W\Controller\Controller;

class PageController extends Controller
{

    // Page User
    public function user()
    {
        $this->show('default/home', ['title' => 'page user']);
    }

    // Page Assoc
    public function assoc()
    {
        $this->show('default/home', ['title' => 'page assoc']);
    }

    // Page Company
    public function company()
    {
        $this->show('default/home', ['title' => 'page company']);
    }

    // Page Event
    public function event()
    {
        $this->show('default/home', ['title' => 'page event']);
    }

}