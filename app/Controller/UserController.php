<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel as Auth;
use \Model\UsersModel as User;

class UserController extends Controller
{
  // Fonction pour filtrer les post de PHP
  function post($param)
  {
    return strip_tags(trim($_POST[$param]));
  }
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
					'nickname' => $this->post('nickname'),
					'email'    => $this->post('email')
				];

              if (isset($_FILES['file'])){

                  if(in_array($_FILES['file']['type'], $extensions) && isset($_FILES['file']['tmp_name'])){

                      move_uploaded_file($_FILES['file']['tmp_name'],"assets/img/avatar/".$_FILES['file']['name']);
                      $datas['pictures_profile'] = $_FILES['file']['name'];
                  }
              }

              if($this->post('password') == $this->post('confirmpassword')){
                  $datas['password'] = $auth->hashPassword($this->post('password'));
              }

              $user->update($datas, $id['id']);
              $auth->refreshUser($user); // on utilise la session pour afficher les champs que l'on actualise lors de l'envoi de la requete Update
              $this->redirectToRoute('user_profil');
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

          if($this->post('email') == $this->post('confirmmail') && $this->post('password') == $this->post('confirmpassword') && !$user->emailExists($this->post('email')) && !$user->usernameExists($this->post('nickname')) && !empty($this->post('nickname')) && !empty($this->post('email')) && !empty($this->post('password')))
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
                   'type'     => $this->post('type'),
                   'nickname' => $this->post('nickname'),
                   'email'    => $this->post('email'),
                   'password' => $auth->hashPassword($this->post('password'))

                 ];
                 if (isset($_FILES['file']))
                 {
                   $datas['pictures_profile'] = $_FILES['file']['name'];
                 }
                 $user->insert($datas);

              $this->redirectToRoute('security_login');
          }
          else
          {
            $message = '<div>Vérifiez les champs, merci</div>';
          }

        }
          $this->show('user/register', ['title' => 'OutLooker - Inscription', 'message' => $message]);
      }
}
