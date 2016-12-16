<?php

namespace Model;

class UsersModel extends \W\Model\UsersModel {

    protected function selectWhereId($ids)
    {
        if($ids != null){
            $sql = 'SELECT * FROM users WHERE `id` IN (';
            foreach($ids as $key => $id){
                $sql .= $id;
                if($key != count($ids) - 1){
                    $sql .= ',';
                }
            }
            $sql .= ')';
            $user = $this->dbh->query($sql);
            return $user->fetchAll();
        }else{
            return '';
        }
    }

    public function findGuestPart($unserilizeTabId)
	{
        $tabId = unserialize($unserilizeTabId);
        $guestId = (isset($tabId['guest'])) ? $tabId['guest'] : null;
        $partId = (isset($tabId['part'])) ? $tabId['part'] : null;

        $guest = $this->selectWhereId($guestId);
        $part = $this->selectWhereId($partId);

		return ['guest' => $guest, 'part' => $part];
	}

  public function updateToken($token, $email)
  {
     $sql = "UPDATE users set token ='".$token."' WHERE email= '".$email."'";
     $sth = $this->dbh->query($sql);
  }

  public function verifToken($token)
  {
    $sql = "SELECT * FROM users WHERE token= :token";
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':token', $token);
    $sth->execute();
    return $sth->fetch();

  }

}

?>
