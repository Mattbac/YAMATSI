<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel as Auth;
use \Model\UsersModel as User;


class RegisterController extends Controller
{

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
                 'nickname' => $_POST['nickname'],
                 'email'    => $_POST['email'],
                 'password' => $auth->hashPassword($_POST['password']),
                 'type'     => $_POST['type'],
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
        $this->show('register/user', ['title' => 'OutLooker - Inscription', 'message' => $message]);
    }
}
