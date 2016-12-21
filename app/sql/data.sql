INSERT INTO `event` (`id`, `name`, `adress`, `message`, `date_time`, `end_of_event`, `start_of_event`, `picture_first`, `users_id`, `guest_part_id`, `coor_lat`, `coor_lng`, `comment_autorize`, `category_of`, `type_id`) VALUES
(1, 'blue', '36 rue blue', 'blueblue blue blue blue blue', 'a:5:{i:0;a:2:{i:0;i:1482658200;i:1;i:1482665400;}i:1;a:2:{i:0;i:1482744600;i:1;i:1482751800;}i:2;a:2:{i:0;i:1482831000;i:1;i:1482838200;}i:3;a:2:{i:0;i:1482917400;i:1;i:1482924600;}i:4;a:2:{i:0;i:1483039800;i:1;i:1483050600;}}', '1482966000', '1482620400', 'animal.jpg', 1, 'a:2:{s:5:"guest";s:0:"";s:4:"part";a:3:{i:0;a:2:{s:2:"id";s:1:"5";s:8:"nickname";s:4:"klop";}i:1;a:2:{s:2:"id";s:1:"8";s:8:"nickname";s:8:"mohammed";}i:2;a:2:{s:2:"id";s:1:"4";s:8:"nickname";s:8:"simonoub";}}}', 50, 3, 1, '2', 5);

INSERT INTO `comment` (`id`, `event_id`, `users_id`, `comment_id`, `message`, `title`, `created_at`) VALUES
(1, 1, 1, NULL, 'Ceci est un commentaire', 'Commentaire', 55668444),
(2, 1, 2, NULL, 'Second commentaire', 'Commentaire 2', 86541651);

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Tout type'),
(2, 'Danse'),
(3, 'Loisir'),
(4, 'Exposition'),
(5, 'Sport'),
(6, 'Théâtre'),
(7, 'Musique');

INSERT INTO `users` (`id`, `nickname`, `email`, `password`, `message`, `pictures_profile`, `picture_other`, `rate`, `valid`, `type`, `token`) VALUES
(1, 'Yanis', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(2, 'snif', 'snif@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(3, 'mattoub', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(4, 'simonoub', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(5, 'klop', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(6, 'farid', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(7, 'said', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(8, 'mohammed', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(9, 'kamel', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(10, 'karim', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(11, 'billel', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(12, 'franck', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(13, 'annie', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(14, 'annick', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(15, 'antonette', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(16, 'bichonnette', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(17, 'scarlet', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(18, 'huguette', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(19, 'perette', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(20, 'alex', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(21, 'clem', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(22, 'fred', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(23, 'marc', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(24, 'kunta', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(25, 'joseph', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(26, 'fetnat', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL),
(27, 'boubakar', 'belaidyis@late.net', '$2y$10$6y5ataBamqUQVx2.MylKpO1jAzAaH1jUlQHycCDDGS/hubRgWjJum', NULL, 'animal.jpg', NULL, 0, 0, 'comp', NULL);
