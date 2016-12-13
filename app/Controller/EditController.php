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
          ## EXTENSIONS DE FICHIERS ACCEPTES ### */

            $extensions = ["image/png", "image/gif", "image/jpg", "image/jpeg"];

          /* ### CLASSE LES AVATARS PAR USER ### */
            if (isset($_FILES['file']))
              {
                if(in_array($_FILES['file']['type'], $extensions))
                {
                  move_uploaded_file($_FILES['file']['tmp_name'],"assets/img/avatar/".$_FILES['file']['name']);
                }
                if($_FILES['file']['name'] == "")
                {
                    // RIEN SI AUCUN FICHIER CHARGE
                }
                else
                {
                    $avatar = '';
                }

            $datas = [
              'nickname' => $_POST['nickname'],
              'email'    => $_POST['email'],
              'password' => $auth->hashPassword($_POST['password'])
            ];

            if (isset($_FILES['file']))
            {
              $datas['pictures_profile'] = $_FILES['file']['name'];
            }
            $user->update($datas, $id['id']);

            $auth->refreshUser($user); // on utilise la sesison pour afficher les champs donc il faut l'actualiser lors de l'envoi de la requete Update

            $message = '<div>Félicitation vous êtes bien inscrit</div>';
            }
            else
            {
              $message = '<div>Vérifiez les champs, merci</div>';
            }

        $this->show('edit/user', ['title' => 'edit user', 'message'=> $message, 'compFormulaire' => $this->getUser()]);
    }



}
