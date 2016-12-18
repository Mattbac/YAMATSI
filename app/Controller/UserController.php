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
            $this->show('user/profilUser', ['title' => 'page user perso '.$id, 'user' => $this->getUser()]);
        }elseif($id != 0){
            $this->show('user/profil', ['title' => 'page user '.$id, 'user' => $user->find($id)]);
        }else{
            $this->redirectToRoute('security_login');
        }
    }

	public function edit()
    {
        $extensions = ["image/png", "image/gif", "image/jpg", "image/jpeg"];

        $user = new User;
        $auth = new Auth;
          
        $id = $this->getUser();
            if(isset($_POST['edit'])){

				$datas = [
					'nickname' => $_POST['nickname'],
					'email'    => $_POST['email']
				];

              if (isset($_FILES['file'])){

                  if(in_array($_FILES['file']['type'], $extensions) && isset($_FILES['file']['tmp_name'])){

                      move_uploaded_file($_FILES['file']['tmp_name'],"assets/img/avatar/".$_FILES['file']['name']);
                      $datas['pictures_profile'] = $_FILES['file']['name'];
                  }
              }

              if($_POST['password'] == $_POST['confirmpassword']){
                  $datas['password'] = $auth->hashPassword($_POST['password']);
              }

              $user->update($datas, $id['id']);
              $auth->refreshUser($user); // on utilise la session pour afficher les champs que l'on actualise lors de l'envoi de la requete Update
            }
          $this->show('user/edit', ['title' => 'edit user', 'compFormulaire' => $this->getUser()]);
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
