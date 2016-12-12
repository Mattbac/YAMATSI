<?php

namespace Model;

class Villes_franceModel extends \W\Model\Model {

    public function findBySlug($slug, $tableName)
	{
		$searchBefore = '%';
		if(is_int($slug)){
			$searchBefore = '';
		}

		$sql = "SELECT * FROM ".$this->table." WHERE ".$tableName." like '".$searchBefore.$slug."%' ORDER BY ville_population_2012 DESC LIMIT 10";

		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}
}

?>