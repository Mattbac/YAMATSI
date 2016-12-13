<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel as Auth;
use \Model\UsersModel as User;

class UserController extends Controller
{

    public function profil($id = 0)
    {
        $this->show('user/profil', ['title' => 'page user '.$id]);
    }

    public function edit($value='')
    {
        $message = '';
        $user = new User;
        $auth = new Auth;
        $id = $this->getUser(); // recuperation de l'ID

          if(isset($_POST['edit']))

          // FAIRE CAS D'ERREURS

          {
            $user->update([
              'nickname' => $_POST['nickname'],
              'email'    => $_POST['email'],
              'password' => $auth->hashPassword($_POST['password']),
              'type'     =>'assoc'
            ],$id['id']);

              $auth->refreshUser($user); // on utilise la sesison pour afficher les champs donc il faut l'actualiser lors de l'envoi de la requete Update

              $message = '<div>Félicitation vous êtes bien inscrit</div>';
          }
            else
            {
              $message = '<div>Vérifiez les champs, merci</div>';
            }

        $this->show('user/edit', ['title' => 'edit user', 'message'=> $message, 'compFormulaire' => $this->getUser()]);
    }

    public function register($value='')
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
        $this->show('user/register', ['title' => 'OutLooker - Inscription', 'message' => $message]);
    }
}
