<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel as Auth;
use \Model\UsersModel as User;

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
  ////////////////////////////////////////
  //    VERIFICATION DU token           //
  ////////////////////////////////////////

  // si on vient du lien du mail, à l'aide du token
  if(isset($_GET['token'])) {
      //on "trim" si l utilisateur decide de mettre un espace dans le token suite à un mauvais copier coller
      $token = trim($_GET['token']);
      //on prepare une requête
      $q=$db->prepare("SELECT * FROM users WHERE token= :token");
      $q->bindValue(":token", $token, PDO::PARAM_STR);
      $q->execute();
      $user=$q->fetch();

      if($user){
          //on verifie la validité du token ainsi que la date de "peremption" du token grace au time stamp que l'on a rajouté à la fin
          $timetoken= time() - substr($user['token'],32) ;
          //validité du token 1H soit 3600 s
          if($timetoken<= 3600){?>
              <!--formulaire de création d'un nouveau mot de passe -->
              <p>Changer de mot de passe</p>
              <form method="POST">
                  <input type="password" name="password" placeholder="mot de passe">
                  <input type="password" name="password-cf" placeholder="confirmer votre mot de passe">
                  <button name="forget"> redefinir mon mot de passe </button>
              </form>
              <?php
                  // on verifie que les 2 mots de passe sont identique
                  if(isset($_POST['forget'])){
                          $password=trim($_POST['password']);
                          $passwordCf=trim($_POST['password-cf']);
                          // on verifie que le mot de pase fasse 8 caractère et qu'il sont egaux
                          if (strlen($password) >= 8 && $password == $passwordCf){
                          // on change le mot de passe
                          $q= $db->prepare("UPDATE users SET token=NULL, password = :password WHERE id = ".$user['id']);
                          $q->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
                          $q->execute();
                              }else{
                                  echo "Le mot de passe n est pas valide";
                              }//fin if $password >=8 et identique
                          }// if isset $post[forget]

          }
          else {
              echo "le token n'est plus valide depuis le " .date("d/m/Y H:i:s", substr($user['token'], 32)).".";
              $db->query("UPDATE users SET token = NULL where id = ".$user['id']);
          }//fin if $timetoken<=3600
      }//fin if user


  }//fin if isset GET[token]
  else{
   ?>

   <!-- *////////////////////////////////////////
   //     FORMULAIRE DE MOT DE PASSE OUBLIE //
   //////////////////////////////////////// -->


  <H1>Mot de passe oublié ? </h1>
  <p>récupérer votre mot de passe, rentrer votre adresse email</p>
  <!--  formulaire-->
      <form method="POST">
          <input type="email" name="email" placeholder="Email">
          <button name="forget">redefinir votre mot de passe</button>
      </form>

  <?php
  // si le formulaire à été envoyé

  if(isset($_POST["forget"])){
      //on sécurise le serveur
      $email=strip_tags(trim($_POST['email']));
      //on verifie que l'email existe
      $q = $db->prepare("SELECT * from users where email=:email");
      $q->bindValue(":email", $email, PDO::PARAM_STR);
      $q->execute();
      $user=$q->fetch();


      //si l'utilisateur existe
      if($user){
          //on génère un token (md5 + timestamp)
          $token = md5(uniqid()). time();
          //$header pour mettre du html dans le mail
          $headers ='MIME-Version: 1.0'. "\r\n";
          $headers ='Content-type: text/html; charset=iso-8859-1'. "\r\n";
          //envoye du mail qui est un lien pour recréer un mot de passe
          mail($user['email'], "[Outlooker]",
          "<h1>Vous pouvez redefinir votre mot de passe <a href='http://localhost/WF3/ForumPhp/private/templates/forget.php?token=" .$token ."'>ici</a></h1>"
          ,$headers);
          //on met à jour la base de donnée avec notre token créer
          $db->query("UPDATE users set token ='".$token."' WHERE email= '".$user['email']."'");
          echo "un mail vous a été envoyé";
      }


  }//fin if isset post[forget]
  }//fin isset token

    $this->show('security/forget');
  }

}

?>
