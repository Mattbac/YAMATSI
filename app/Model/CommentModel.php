<?php

namespace Model;

class CommentModel extends \W\Model\Model {

    public function findAllComWithId($id)
	{
		if (!is_numeric($id)){
			return false;
		}

		$sql = 'SELECT * FROM ' . $this->table . ' WHERE event_id = :id LIMIT 3';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id);
		$sth->execute();

		return $sth->fetchAll();
	}
}

?>