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
}

?>