<?php

namespace Model;

class CommentModel extends \W\Model\Model {

    public function findAllComWithId($id)
	{
		$com = [];
		if(!is_numeric($id)){
			return false;
		}
		$sql = 'SELECT c.*, u.nickname FROM '.$this->table.' AS c, users AS u WHERE c.event_id = :id AND u.id = c.users_id AND c.title IS NOT null ORDER BY c.created_at';

		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id);
		$sth->execute();
		$com['1'] = $sth->fetchAll();

		if(!empty($com['1'])){
			$sql = 'SELECT c.*, u.nickname FROM '.$this->table.' AS c, users AS u WHERE c.comment_id = :id AND u.id = c.users_id';

			$com['2'] = [];
			foreach($com['1'] as $key => $id){
				$sth = $this->dbh->prepare($sql);
				$sth->bindValue(':id', $id['id']);
				$sth->execute();
				$comanswer = $sth->fetchAll();
				if(!empty($comanswer)){
					$com['2'][$key] = $comanswer;
				}
			}
		}else{
			$com['2'] = '';
		}

		return $com;
	}
}

?>