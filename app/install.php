<?php
$db = new PDO('mysql:host='.$w_config['db_host'].';dbname=', $w_config['db_user'], $w_config['db_pass']);
$db->query("CREATE DATABASE IF NOT EXISTS ".$w_config['db_name']);


$db = new PDO('mysql:host='.$w_config['db_host'].';dbname='.$w_config['db_name'], $w_config['db_user'], $w_config['db_pass']);

$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,/* id */
nickname VARCHAR(255) NOT NULL,/* nickname */
email VARCHAR(255) NOT NULL,/* email */
password VARCHAR(255) NOT NULL,/* Password */
message TEXT(255),/* Presentation message */
valid INT(1),/* Compte valide or not */
type VARCHAR(255) NOT NULL/* user, assoc, comp */
)";
$db->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS assoc_comp (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,/* id */
name VARCHAR(255) NOT NULL,/* name of the comp or assoc */
email VARCHAR(255) NOT NULL,/* email */
password VARCHAR(255) NOT NULL,/* password */
message TEXT(255) NOT NULL,/* presentation message */
picture_first VARCHAR(255),/* presentation picture */
picture_other VARCHAR(255),/* other picture */
rate INT(11),/* rate of the assoc */
valid INT(1),/* Compte valide or not */
type VARCHAR(255) NOT NULL/* user, assoc, comp */
)";
$db->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS event (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,/* id */
name VARCHAR(255) NOT NULL,/* Name of the event */
message TEXT(255) NOT NULL,/* presentation message of the event */
date_time TEXT(255) NOT NULL,/* range of date and time in format text with serialize */
picture_first VARCHAR(255),/* presentation picture */
assoc_comp_id INT(11) NOT NULL,/* id of the assoc or comp who create the event */
coor_lat INT(11) NOT NULL,/* coor_lat */
coor_lng INT(11) NOT NULL,/* coor_lng */
comment_autorize INT(1),/* comment autorize or not */
category_of VARCHAR(255) NOT NULL,/* child, teenager, adult, tout public */
type_id INT(11) NOT NULL/* musique, art, danse, sport ... */
)";
$db->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS comment (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,/* id */
event_id INT(11) NOT NULL,/* id of the event */
users_id INT(11),/* id of the user who write the comment */
assoc_comp_id INT(11),/* id of the assoc or comp who write the comment */
comment_id INT(11),/* id of the comment who was first create */
message TEXT(255) NOT NULL,/* message */
title VARCHAR(255),/* title of the comment when it is the first comment */
created_at INT(11) NOT NULL,/* timestamp */
comment_value INT(11)/* timestamp */
)";
$db->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS rate_event (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,/* id */
event_id INT(11) NOT NULL,/* id of the event */
users_id INT(11) NOT NULL,/* id of the user */
rate_value INT(11) NOT NULL/* between 1 and 4 */
)";
$db->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS rate_comment (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,/* id */
comment_id INT(11) NOT NULL,/* id of the event */
users_id INT(11) NOT NULL/* id of the user */
)";
$db->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS type (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,/* id */
name VARCHAR(255) NOT NULL/* id of the event */
)";
$db->query($sql);



?>