<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel as Auth;
use \Model\UsersModel as User;

class UserController extends Controller
{

    public function profil($id = 0)
    {
        $user = new User;
        if($id == 0 && isset($this->getUser()['id'])) {
            /*var_dump($this->getUser());*/
            $this->show('user/profilUser', ['title' => 'page user perso '.$id, 'user' => $this->getUser()]);
        }else{
            $this->show('user/profil', ['title' => 'page user '.$id, 'user' => $user->find($id)]);
        }
    }

    public function edit()
    {

          $message = '';
          $user = new User;
          $auth = new Auth;
          $id = $this->getUser(); // recuperation de l'ID

            if(isset($_POST['edit'])){

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

              if (isset($_FILES['file']['tmp_name']))
              {
                $datas['pictures_profile'] = $_FILES['file']['name'];
              }
              $user->update($datas, $id['id']);

              $auth->refreshUser($user); // on utilise la sesison pour afficher les champs donc il faut l'actualiser lors de l'envoi de la requete Update

              $message = '<div>Profil modifié</div>';
              }
              else
              {
                $message = '<div></div>';
              }
            }
          $this->show('user/edit', ['title' => 'edit user', 'message'=> $message, 'compFormulaire' => $this->getUser()]);
      }


    public function register()
    {
        $message = '';
        if(isset($_POST['submit']))
        {
          $user = new User();
          $auth = new Auth();

          if($_POST['email'] == $_POST['confirmmail'] && $_POST['password'] == $_POST['confirmpassword'] && !$user->emailExists($_POST['email']) && !$user->usernameExists($_POST['nickname']) && !empty($_POST['nickname']) && !empty($_POST['email']) && !empty($_POST['password']))
          {
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
     						 }
                 $datas = [
                   'type'     => $_POST['type'],
                   'nickname' => $_POST['nickname'],
                   'email'    => $_POST['email'],
                   'password' => $auth->hashPassword($_POST['password'])

                 ];
                 if (isset($_FILES['file']))
                 {
                   $datas['pictures_profile'] = $_FILES['file']['name'];
                 }
                 $user->insert($datas);

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
