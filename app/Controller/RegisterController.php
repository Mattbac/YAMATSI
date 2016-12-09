<?php

namespace Controller;

use \W\Controller\Controller;

class RegisterController extends Controller
{

    // Register Type
    public function type()
    {
        $this->show('register/selector', ['title' => 'OutLooker - Inscription']);
    }

    // Register Assoc
    public function assoc()
    {
        $this->show('register/assoc', ['title' => 'OutLooker - Inscription']);
    }

    // Register Company
    public function company()
    {
        $this->show('register/company', ['title' => 'OutLooker - Inscription']);
    }

    // Register User
    public function user()
    {
        $this->show('register/user', ['title' => 'OutLooker - Inscription']);
    }

}