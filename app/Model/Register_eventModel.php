<?php

namespace Model;

class Register_eventModel extends \W\Model\Model {

    public function isAllreadyRegister($userid, $eventid)
    {
        if (!is_numeric($userid) || !is_numeric($eventid)){
            return false;
        }

        $sql = 'SELECT * FROM ' . $this->table . ' WHERE users_id = :usersid AND event_id = :eventid';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':usersid', $userid);
        $sth->bindValue(':eventid', $eventid);
        $sth->execute();

        return $sth->fetch();
    }

    public function cancel_register($userid, $eventid)
	{
		if (!is_numeric($userid) || !is_numeric($eventid)){
            return false;
        }

		$sql = 'DELETE FROM ' . $this->table . ' WHERE users_id = :usersid AND event_id = :eventid';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':usersid', $userid);
        $sth->bindValue(':eventid', $eventid);

		return $sth->execute();
	}

    public function findAllUserid($userid)
	{
		if (!is_numeric($userid)){
            return false;
        }

		$sql = 'SELECT event_id FROM ' . $this->table . ' WHERE users_id = :usersid';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':usersid', $userid);
        $sth->execute();

        return $sth->fetchAll();
	}

    public function findAllRegister($eventid)
	{
		if (!is_numeric($eventid)){
            return false;
        }

		$sql = 'SELECT r.users_id, u.nickname FROM ' . $this->table . ' AS r, users AS u WHERE event_id = :eventid AND u.id = r.users_id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':eventid', $eventid);
        $sth->execute();

        return $sth->fetchAll();
	}
}

?>