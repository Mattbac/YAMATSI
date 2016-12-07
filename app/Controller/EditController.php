<?php

namespace Controller;

use \W\Controller\Controller;

class EditController extends Controller
{

    // Edition User Form
    public function user()
    {
        $this->show('default/home', ['title' => 'edit user']);
    }

    // Edition Assoc Form
    public function assoc()
    {
        $this->show('default/home', ['title' => 'edit assoc']);
    }

    // Edition Company Form
    public function company()
    {
        $this->show('default/home', ['title' => 'edit company']);
    }

    // Edition Event Form
    public function event()
    {
        $this->show('default/home', ['title' => 'edit event']);
    }

}