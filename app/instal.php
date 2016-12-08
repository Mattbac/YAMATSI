<?php

$db = new PDO('mysql:host='.$w_config['db_host'].';dbname=', $w_config['db_user'], $w_config['db_pass']);
$db->query("CREATE DATABASE IF NOT EXISTS ".$w_config['db_name']);


$db = new PDO('mysql:host='.$w_config['db_host'].';dbname='.$w_config['db_name'], $w_config['db_user'], $w_config['db_pass']);

$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
nickname VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL,
message VARCHAR(255),
valid INT(1),
type VARCHAR(255) NOT NULL
)";

$db->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS assoc_comp (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL,
message VARCHAR(255) NOT NULL,
picture_first VARCHAR(255),
picture_other VARCHAR(255),
valid INT(1),
type VARCHAR(255) NOT NULL
)";

$db->query($sql);


?>