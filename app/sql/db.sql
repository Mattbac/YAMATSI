CREATE TABLE IF NOT EXISTS users (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,/* id */
nickname VARCHAR(255) NOT NULL,/* nickname */
email VARCHAR(255) NOT NULL,/* email */
password VARCHAR(255) NOT NULL,/* Password */
message TEXT(),/* Presentation message */
pictures_profile VARCHAR(255),/* presentation picture */
picture_other VARCHAR(255),/* other picture */
rate SMALLINT(5),/* rate of the assoc */
valid TINYINT(1) NOT NULL,/* Compte valide or not */
type VARCHAR(255) NOT NULL,/* user, assoc, comp */
token VARCHAR(255) NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS event (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,/* id */
name VARCHAR(255) NOT NULL,/* Name of the event */
message TEXT() NOT NULL,/* presentation message of the event */
date_time TEXT() NOT NULL,/* range of date and time in format text with serialize */
picture_first VARCHAR(255),/* presentation picture */
users_id INT(11) NOT NULL,/* id of the assoc or comp who create the event */
guest_part_id INT(11) NOT NULL,/* id of the guest or partenaire*/
coor_lat FLOAT(38) NOT NULL,/* coor_lat */
coor_lng FLOAT(38) NOT NULL,/* coor_lng */
comment_autorize TINYINT(1) NOT NULL,/* comment autorize or not */
category_of INT(11) NOT NULL,/* child, teenager, adult, tout public */
type_id INT(11) NOT NULL/* musique, art, danse, sport ... */) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS comment (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,/* id */
event_id INT(11) NOT NULL,/* id of the event */
users_id INT(11) NOT NULL,/* id of the user who write the comment */
comment_id INT(11),/* id of the comment who was first create */
message TEXT() NOT NULL,/* message */
title VARCHAR(255),/* title of the comment when it is the first comment */
created_at INT(11) NOT NULL/* timestamp */) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS rate_event (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,/* id */
event_id INT(11) NOT NULL,/* id of the event */
users_id INT(11) NOT NULL,/* id of the user */
rate_value INT(1) NOT NULL/* between 1 and 4 */) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS rate_comment (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,/* id */
comment_id INT(11) NOT NULL,/* id of the event */
users_id INT(11) NOT NULL,/* id of the user */
rate_value INT(1) NOT NULL/* id of the user */) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS type (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,/* id */
name VARCHAR(255) NOT NULL/* id of the event */) ENGINE=InnoDB DEFAULT CHARSET=utf8;