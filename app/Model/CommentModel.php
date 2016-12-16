<?php

namespace Model;

class CommentModel extends \W\Model\Model {

    public function findAllComWithId($id)
	{
		$com = [];
		if (!is_numeric($id)){
			return false;
		}
		/*$sql = 'SELECT c.*, u.nickname FROM '.$this->table.' AS c, users AS u WHERE c.event_id = :id AND u.id = c.users_id';*/
		/*$sql = 'SELECT * FROM '.$this->table.' WHERE `event_id` = :id AND `title` IS NOT null ORDER BY created_at LIMIT 3';*/
		$sql = 'SELECT c.*, u.nickname FROM '.$this->table.' AS c, users AS u WHERE c.event_id = :id AND u.id = c.users_id AND c.title IS NOT null ORDER BY created_at LIMIT 3';

		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id);
		$sth->execute();
		$com['1'] = $sth->fetchAll();

		/*$sql = 'SELECT * FROM '.$this->table.' WHERE `comment_id` IN () OR `event_id` = 1 AND `title` IS NOT null';*/
		$sql = 'SELECT c.*, u.nickname FROM '.$this->table.' AS c, users AS u WHERE c.comment_id IN (:id1, :id2, :id3) AND u.id = c.users_id';

		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id1', $com['1'][0]['id']);
		$sth->bindValue(':id2', $com['1'][1]['id']);
		$sth->bindValue(':id3', $com['1'][2]['id']);
		$sth->execute();
		$com['2'] = $sth->fetchAll();

		return $com;
	}
}

?>