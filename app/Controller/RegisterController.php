<?php

namespace Controller;

use \W\Controller\Controller;

class RegisterController extends Controller
{

    // Register Type
    public function type()
    {
        $this->show('default/home', ['title' => 'register type']);
    }

    // Register Assoc
    public function assoc()
    {
        $this->show('default/home', ['title' => 'register assoc']);
    }

    // Register Company
    public function company()
    {
        $this->show('default/home', ['title' => 'register company']);
    }

    // Register User
    public function user()
    {
        $this->show('default/home', ['title' => 'register user']);
    }

}