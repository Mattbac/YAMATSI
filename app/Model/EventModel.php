<?php

namespace Model;

class EventModel extends \W\Model\Model {
    
    public function findAll($orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
	{

		$sql = 'SELECT id, name, coor_lat, coor_lng, category_of, type_id FROM ' . $this->table;
		if (!empty($orderBy)){

			//sécurisation des paramètres, pour éviter les injections SQL
			if(!preg_match('#^[a-zA-Z0-9_$]+$#', $orderBy)){
				die('Error: invalid orderBy param');
			}
			$orderDir = strtoupper($orderDir);
			if($orderDir != 'ASC' && $orderDir != 'DESC'){
				die('Error: invalid orderDir param');
			}
			if ($limit && !is_int($limit)){
				die('Error: invalid limit param');
			}
			if ($offset && !is_int($offset)){
				die('Error: invalid offset param');
			}

			$sql .= ' ORDER BY '.$orderBy.' '.$orderDir;
			if($limit){
				$sql .= ' LIMIT '.$limit;
				if($offset){
					$sql .= ' OFFSET '.$offset;
				}
			}
		}
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}

	public function findAllEventWithIds($ids)
	{
		$sql = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
		$events = [];

		foreach($ids as $key => $id){
			$sth = $this->dbh->prepare($sql);
			$sth->bindValue(':id', $id['event_id']);
			$sth->execute();
			$event = $sth->fetch();
			if(!empty($event)){
				$events[$key] = $event;
			}
		}

		return $events;
	}

	public function findAllEventWithNotIds($ids)
	{
		$sql = 'SELECT * FROM ' . $this->table . ' WHERE id NOT IN (';

		foreach($ids as $key => $id){
			if($key != 0){
				$sql .= ',';
			}
			$sql .= $id['event_id'];
		}
		$sql .= ') AND end_of_event > :date';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':date', (new \DateTime())->getTimestamp());
		$sth->execute();
		$events = $sth->fetchAll();


		return $events;
	}

	public function findAllEventWithSpecial($category_id, $type_id, $date)
	{
		$sql = 'SELECT id, name, coor_lat, coor_lng, category_of, type_id FROM '.$this->table.' WHERE';
		if($category_id != 'null' && $category_id != 0 && is_numeric($category_id)){
			$sql .= ' category_of IN (0,'.$category_id.')';
		}

		if($type_id != 'null' && $category_id != 'null' && $type_id != 0 && is_numeric($type_id) && is_numeric($category_id)){
			$sql .= ' AND type_id IN (0,'.$type_id.')';
		}elseif($type_id != 'null' && $type_id != 0 && is_numeric($type_id)){
			$sql .= ' type_id IN (0,'.$type_id.')';
		}

		if($date != 'null' && $type_id != 'null' && $date != 0 && is_numeric($type_id)){
			$sql .= ' AND end_of_event >= :date AND start_of_event <= :date';
		}elseif($date != 'null' && $date != 0){
			$sql .= ' end_of_event >= :date AND start_of_event <= :date';
		}

		file_put_contents('text.txt', $sql);

		$sth = $this->dbh->prepare($sql);
		if($date != 'null' && $date != 0){
			$sth->bindValue(':date'		, (new \DateTime($date))->getTimestamp());
		}
		$sth->execute();

		return $sth->fetchAll();
	}

}

?>
