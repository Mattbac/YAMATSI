<?php

mysql_connect($w_config['db_host'], $w_config['db_user'], $w_config['db_pass']);

if (!mysql_select_db($w_config['db_name'])) {

    $db = new PDO('mysql:host='.$w_config['db_host'].';dbname=', $w_config['db_user'], $w_config['db_pass']);

    $db->query("CREATE DATABASE IF NOT EXISTS ".$w_config['db_name']);

    $db = new PDO('mysql:host='.$w_config['db_host'].';dbname='.$w_config['db_name'], $w_config['db_user'], $w_config['db_pass']);

    $pdodbimport = new PDODbImporter();

    $sql = file_get_contents("../app/sql/villes_france.sql");
    $pdodbimport->importSQL("../app/sql/db.sql", $db);

    $sql = file_get_contents("../app/sql/villes_france.sql");
    $pdodbimport->importSQL("../app/sql/villes_france.sql", $db);

}
?>
