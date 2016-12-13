<?php

namespace Model;

class Villes_franceModel extends \W\Model\Model {

    public function findBySlug($slugs)
	{
		$sql = "SELECT * FROM ".$this->table." WHERE";
		foreach ($slugs as $key => $slug) {
			if(is_numeric($slug)){
				$sql .= " ville_code_postal like '".$slug."%'";
			}else{
				$sql .= " ville_nom_reel like '%".$slug."%'";
			}

			if($key < count($slugs)-1){
				$sql .= " AND";
			}
		}

		$sql .= " ORDER BY ville_population_2012 DESC LIMIT 10";

		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}
}

?>