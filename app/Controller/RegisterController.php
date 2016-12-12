<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel as Auth;
use \Model\UsersModel as User;
use \Model\Assoc_compModel as Assoc_comp;

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
      $message = '';
      if(isset($_POST['submit']))
      {
        $comp = new Assoc_comp();
        $auth = new Auth();

        if($_POST['email'] == $_POST['confirmmail'] && $_POST['password'] == $_POST['confirmpassword'] && !$comp->emailExists($_POST['email']) && !$comp->usernameExists($_POST['name']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['message']))
        {
          $comp->insert([
            'name'     => $_POST['name'],
            'email'    => $_POST['email'],
            'message'  => $_POST['message'],
            'password' => $auth->hashPassword($_POST['password']),
            'type'     =>'assoc'
          ]);

          $message = '<div>Félicitation vous êtes bien inscrit</div>';
        }
        else
        {
          $message = '<div>Vérifiez les champs, merci</div>';
        }

      }
        $this->show('register/assoc', ['title' => 'OutLooker - Inscription', 'message' => $message]);
    }

    // Register Company
    public function company()
    {
      $message = '';
      if(isset($_POST['submit']))
      {
        $comp = new Assoc_comp();
        $auth = new Auth();

        if($_POST['email'] == $_POST['confirmmail'] && $_POST['password'] == $_POST['confirmpassword'] && !$comp->emailExists($_POST['email']) && !$comp->usernameExists($_POST['name']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['message']))
        {
          $comp->insert([
            'name'     => $_POST['name'],
            'email'    => $_POST['email'],
            'message'  => $_POST['message'],
            'password' => $auth->hashPassword($_POST['password']),
            'type'     =>'company'
          ]);

          $message = '<div>Félicitation vous êtes bien inscrit</div>';
        }
        else
        {
          $message = '<div>Vérifiez les champs, merci</div>';
        }
      }
        $this->show('register/company', ['title' => 'OutLooker - Inscription', 'message' => $message]);
    }

    // Register User
    public function user()
    {
      $message = '';
      if(isset($_POST['submit']))
      {
        $user = new User();
        $auth = new Auth();

        if($_POST['email'] == $_POST['confirmmail'] && $_POST['password'] == $_POST['confirmpassword'] && !$user->emailExists($_POST['email']) && !$user->usernameExists($_POST['nickname']) && !empty($_POST['nickname']) && !empty($_POST['email']) && !empty($_POST['password']))
        {
          $user->insert([
            'nickname' => $_POST['nickname'],
            'email'    => $_POST['email'],
            'password' => $auth->hashPassword($_POST['password']),
            'type'     =>'user'
          ]);

          $message = '<div>Félicitation vous êtes bien inscrit</div>';
        }
        else
        {
          $message = '<div>Vérifiez les champs, merci</div>';
        }

      }
        $this->show('register/user', ['title' => 'OutLooker - Inscription', 'message' => $message]);
    }
}
