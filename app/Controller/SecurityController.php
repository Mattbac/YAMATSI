<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel as Auth;
use \Model\UsersModel as User;
use \Model\ForgetModel as Forget;

class SecurityController extends Controller
{
  public function login()
  {
      if(isset($_POST['login']))
      {
          $auth = new Auth();
          $userCheck = $auth->isValidLoginInfo($_POST['email'], $_POST['password']);
            var_dump($userCheck);
          if($userCheck)
          {
            $user = new User();
            $currentUser = $user->find($userCheck);
            $auth->logUserIn($currentUser);
            $this->redirectToRoute('default_home');

          }

      }
      $this->show('security/login');
  }

  public function logout()
   {
     $auth = new Auth();
     $auth->logUserOut();
     $this->redirectToRoute('default_home');
   }

   public function forget()
  {



   }
 }


?>
