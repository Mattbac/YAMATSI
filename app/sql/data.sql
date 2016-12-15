INSERT INTO `event` (`id`, `name`, `message`, `date_time`, `picture_first`, `users_id`, `coor_lat`, `coor_lng`, `comment_autorize`, `category_of`, `type_id`) VALUES
(1, 'yanis', 'sdlfkgnslmdkfg sfgjsdflgkjsdl gkjsdflg jks', '3152264', NULL, 1, 56, 4, 0, '0', 0),
(2, 'event de fou', 'c''est un evenement de fou prevu pour cette hiver, le 28 decembre !', '2645533', NULL, 2, 49, 2, 1, '1', 4),
(3, 'event bleu', 'sdlfkgnslmdkfg sfgjsdflgkjsdl gkjsdflg jks', '3152264', NULL, 1, 56, 4, 0, '0', 0),
(4, 'event vert', 'sdlfkgnslmdkfg sfgjsdflgkjsdl gkjsdflg jks', '3152264', NULL, 1, 56, 4, 0, '0', 0),
(5, 'event marron', 'sdlfkgnslmdkfg sfgjsdflgkjsdl gkjsdflg jks', '3152264', NULL, 1, 56, 4, 0, '0', 0),
(6, 'event black', 'sdlfkgnslmdkfg sfgjsdflgkjsdl gkjsdflg jks', '3152264', NULL, 1, 56, 4, 0, '0', 0),
(7, 'event white', 'sdlfkgnslmdkfg sfgjsdflgkjsdl gkjsdflg jks', '3152264', NULL, 1, 56, 4, 0, '0', 0),
(8, 'event green', 'sdlfkgnslmdkfg sfgjsdflgkjsdl gkjsdflg jks', '3152264', NULL, 1, 56, 4, 0, '0', 0),
(9, 'event orange', 'sdlfkgnslmdkfg sfgjsdflgkjsdl gkjsdflg jks', '3152264', NULL, 1, 56, 4, 0, '0', 0),
(10, 'event red', 'sdlfkgnslmdkfg sfgjsdflgkjsdl gkjsdflg jks', '3152264', NULL, 1, 56, 4, 0, '0', 0),
(11, 'event violet', 'sdlfkgnslmdkfg sfgjsdflgkjsdl gkjsdflg jks', '3152264', NULL, 1, 56, 4, 0, '0', 0),
(12, 'event gris', 'sdlfkgnslmdkfg sfgjsdflgkjsdl gkjsdflg jks', '3152264', NULL, 1, 56, 4, 0, '0', 0),
(13, 'event prune', 'sdlfkgnslmdkfg sfgjsdflgkjsdl gkjsdflg jks', '3152264', NULL, 1, 56, 4, 0, '0', 0),
(14, 'event super', 'sdlfkgnslmdkfg sfgjsdflgkjsdl gkjsdflg jks', '3152264', NULL, 1, 56, 4, 0, '0', 0),
(15, 'Tortuga', 'événement sur les tortues', '654654654', NULL, 3, 43, 6, 1, '1', 4);

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
