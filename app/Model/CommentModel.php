<?php

namespace Model;

class CommentModel extends \W\Model\Model {

    public function findAllComWithId($id)
	{
		if (!is_numeric($id)){
			return false;
		}

		$sql = 'SELECT c.*, u.nickname FROM '.$this->table.' AS c, users AS u WHERE c.event_id = :id AND u.id = c.users_id';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id);
		$sth->execute();

		return $sth->fetchAll();
	}
}

?>