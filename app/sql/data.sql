INSERT INTO `event` (`id`, `name`, `message`, `date_time`, `picture_first`, `users_id`, `coor_lat`, `coor_lng`, `comment_autorize`, `category_of`, `type_id`) VALUES
(1, 'yanis', 'sdlfkgnslmdkfg sfgjsdflgkjsdl gkjsdflg jks', '3152264', NULL, 1, 56, 4, 0, '0', 0),
(3, 'event de fou', 'c''est un evenement de fou prevu pour cette hiver, le 28 decembre !', '2645533', NULL, 2, 49, 2, 1, '1', 4),
(4, 'Tortuga', 'événement sur les tortues', '654654654', NULL, 3, 43, 6, 1, '1', 4);

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