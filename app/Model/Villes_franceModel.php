<?php

namespace Model;

class Villes_franceModel extends \W\Model\Model {

    public function findBySlug($slug)
	{
		$sql = "SELECT * FROM ".$this->table." WHERE ville_nom_reel like '%".$slug."%' ORDER BY ville_population_2012 DESC LIMIT 10";

		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}
}

?>