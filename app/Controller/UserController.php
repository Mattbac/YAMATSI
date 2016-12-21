<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel as Auth;
use \Model\UsersModel as UserModel;
use \Model\EventModel as EventModel;
use \Model\TypeModel as TypeModel;
use \Model\Register_eventModel as Register_eventModel;

class UserController extends Controller
{
  // Fonction pour filtrer les post de PHP
    function post($param)
    {
        return strip_tags(trim($_POST[$param]));
    }

    function array_sort($array, $on, $order=SORT_ASC)
    {
        $new_array = array();
        $sortable_array = array();

        if (count($array) > 0) {
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $on) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                    $sortable_array[$k] = $v;
                }
            }
            switch ($order) {
                case SORT_ASC:
                    asort($sortable_array);
                break;
                case SORT_DESC:
                    arsort($sortable_array);
                break;
            }
            foreach ($sortable_array as $k => $v) {
                $new_array[$k] = $array[$k];
            }
        }
        return $new_array;
    }

    public function profil($id = 0)
    {
        $user                       = new UserModel;
        $event                      = new EventModel;
        $typeModel                  = new TypeModel();
        $register_event             = new Register_eventModel;

        if($id == 0 && isset($this->getUser()['id'])) {
            $alleventregister = $register_event->findAllUserid($this->getUser()['id']);
            $alleventregister = (empty($alleventregister)) ? [0 => ['event_id' => '0']] : $alleventregister;
            $eventregisters = $this->array_sort($event->findAllEventWithIds($alleventregister), 'end_of_event', 'SORT_DESC');

            foreach ($eventregisters as $key => $eventregister) {
                $eventregisters[$key]['planning']       = unserialize($eventregister['date_time']);
                $eventregisters[$key]['type']           = $typeModel->find($eventregister['type_id']);
                $eventregisters[$key]['type']           = $eventregisters[$key]['type']['name'];
                $eventregisters[$key]['category']       =   ($eventregister['category_of'] == 1) ? 'Enfant' :
                                                        (   ($eventregister['category_of'] == 2) ? 'Adolescent' :
                                                        (   ($eventregister['category_of'] == 3) ? 'Adulte' : 'Tout public'));
            }

            $sugestionEvents                            = $this->array_sort($event->findAllEventWithNotIds($this->array_sort($alleventregister, 'event_id', 'SORT_DESC')), 'end_of_event', 'SORT_ASC');
            foreach ($sugestionEvents as $key => $sugestionEvent) {
                $sugestionEvents[$key]['planning']      = unserialize($sugestionEvent['date_time']);
                $sugestionEvents[$key]['type']          = $typeModel->find($sugestionEvent['type_id']);
                $sugestionEvents[$key]['type']          = $sugestionEvents[$key]['type']['name'];
                $sugestionEvents[$key]['category']      =   ($sugestionEvent['category_of'] == 1) ? 'Enfant' :
                                                        (   ($sugestionEvent['category_of'] == 2) ? 'Adolescent' :
                                                        (   ($sugestionEvent['category_of'] == 3) ? 'Adulte' : 'Tout public'));
            }

            $this->show('user/profilUser',      [   'user'                      => $user->find($id),
                                                    'sugestionEvent'            => $sugestionEvents,
                                                    'eventsregister'            => $eventregisters]);
        }elseif($id != 0){
            $alleventregister = $register_event->findAllUserid($id);
            $eventregisters = $this->array_sort($event->findAllEventWithIds($alleventregister), 'end_of_event', 'SORT_DESC');

            foreach ($eventregisters as $key => $eventregister) {
                $eventregisters[$key]['planning']       = unserialize($eventregister['date_time']);
                $eventregisters[$key]['type']           = $typeModel->find($eventregister['type_id']);
                $eventregisters[$key]['type']           = $eventregisters[$key]['type']['name'];
                $eventregisters[$key]['category']       =   ($eventregister['category_of'] == 1) ? 'Enfant' :
                                                        (   ($eventregister['category_of'] == 2) ? 'Adolescent' :
                                                        (   ($eventregister['category_of'] == 3) ? 'Adulte' : 'Tout public'));
            }
            /*var_dump($eventregisters);*/

            $this->show('user/profil',      [   'user'                      => $user->find($id),
                                                'eventsregister'            => $eventregisters]);
        }else{
            $this->redirectToRoute('security_login');
        }
    }

	public function edit()
    {

        $extensions = ["image/png", "image/gif", "image/jpg", "image/jpeg"];

        $user = new UserModel;
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
          $user = new UserModel();
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
