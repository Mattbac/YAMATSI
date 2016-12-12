<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel as Auth;
use \Model\UsersModel as User;

class EditController extends Controller
{
    // Edition User Form
    public function user()
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

        $this->show('edit/user', ['title' => 'edit user', 'message'=> $message, 'compFormulaire' => $this->getUser()]);
    }

    // Edition Event Form
    public function event()
    {
        $this->show('default/home', ['title' => 'edit event']);
    }

}
