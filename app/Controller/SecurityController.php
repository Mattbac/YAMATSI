<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel as Auth;
use Model\UsersModel as User;

class SecurityController extends Controller
{
  function post($param)
  {
    return strip_tags(trim($_POST[$param]));
  }
    public function login()
    {
        if(!isset($this->getUser()['id'])){
            if(isset($_POST['login']))
            {
                $auth = new Auth();
                $userCheck = $auth->isValidLoginInfo($this->post('email'), $this->post('password'));
                if($userCheck)
                {
                    $user = new User();
                    $currentUser = $user->find($userCheck);
                    $auth->logUserIn($currentUser);
                    $this->redirectToRoute('user_profil');
                }
            }
            $this->show('security/login');
      }else{
          $this->redirectToRoute('user_profil');
      }
  }

  public function logout()
    {
       if(isset($this->getUser()['id'])){
            $auth = new Auth();
            $auth->logUserOut();
            $this->redirectToRoute('default_home');
       }else{
            $this->redirectToRoute('default_home');
       }
   }


   public function forget($token = NULL)
   {
    if(!isset($token))
    {
      if(isset($_POST['forgetMdp']))
      {
       $user = new User;

       $email = $this->post('email');
        var_dump(preg_match("/^[a-z0-9.\-\\_+]+@[a-z0-9.\-_]{2,}\.[a-z]{2,}$/i", $this->post('email')));
        if($user->emailExists($email))
        {
          var_dump($email);
          $token = md5(uniqid()). time();
          // Envoi du mail
			    $mail = new \PHPMailer();
          $mail->addAddress($email);
          $mail->isHTML(true);
          $mail->CharSet = "UTF-8";
          $mail->Subject = "Recupération mot de passe Outlooker";
          $mail->Body = "Redefinir votre mot de passe <a href='http://localhost".$this->generateUrl("security_forget", ['token' => $token])."'>ici</a></h1>"; // rendre dynamique ce lien
          $mail->send();
          $user->updateToken($token, $email);
        }
     }
        $this->show('security/forget');
    }
    else
    {
      $user = new User;
      $auth = new Auth;
      $token = trim($token);
      $error = '';
      $checkUser = $user->verifToken($token);
      if($checkUser)
      {
        if(isset($_POST['resetMdp']))
        {
          $password   = $this->post('password');
          $passwordCf = $this->post('password-cf');
          if ($password == $passwordCf)
          {
            $user->update([
              'token'    => NULL,
              'password' => $auth->hashPassword($password)
            ], $checkUser['id']);
            $this->redirectToRoute('security_login');

          }
          else
          {
            $error = "Le mot de passe n'est pas valide.";
          }
        }
        $this->show('security/forgetToken', ['error' => $error]);
      }else{
        $this->show('security/forget');
      }
    }
  }


}

?>
