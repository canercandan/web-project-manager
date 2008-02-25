
INSERT INTO `tw_activity` (`activity_id`, `activity_project_id`, `activity_parent_id`, `activity_name`, `activity_charge_total`, `activity_date_begin`, `activity_date_end`, `activity_describtion`) VALUES 
(1, 0, 0, 'test', 9, '2008-02-20', NULL, 'descri'),
(2, 0, 0, 'sdc', 3769, '2008-02-20', NULL, 'ds'),
(3, 0, 1, 'sousact', 4, '2008-02-21', '2008-02-23', 'blabla'),
(4, 0, 2, 'testd', 403, '2008-02-21', NULL, 'wqq'),
(5, 0, 2, 'testd', 3121, '2008-02-21', NULL, 'wqq'),
(6, 0, 2, 'testd', 245, '2008-02-21', NULL, 'aqsaq'),
(7, 0, 5, 'testd', 3121, '2008-02-21', NULL, 'aqsaq'),
(8, 0, 6, 'bla', 245, '2008-02-21', NULL, 'toto'),
(9, 0, 1, 'ddw', 5, '2008-02-22', NULL, NULL),
(10, 0, 9, 'breaker', 5, '2008-02-21', NULL, NULL);

INSERT INTO `tw_activity_member` (`activity_member_activity_id`, `activity_member_usr_id`, `activity_level`, `activity_member_date_start`, `activity_member_date_end`, `activity_work`) VALUES 
(1, 2, 1, '2008-02-21', NULL, 1),
(3, 2, 1, '2008-02-21', NULL, 1);

INSERT INTO `tw_location` (`location_id`, `location_name`, `location_address`) VALUES 
(1, 'Epitech Strasbourg', '10, rue de la province\r\n67890 Strasbourg'),
(2, 'Epitech Paris', '14, rue des Anti-Provinciaux\r\n96100 Paris');

INSERT INTO `tw_member` (`member_project_id`, `member_usr_id`, `member_role_id`, `member_date_start`, `member_date_end`) VALUES 
(0, 1, 1, '2008-02-20', NULL),
(0, 2, 2, '2008-02-21', NULL);

INSERT INTO `tw_member_role` (`role_id`, `role_name`) VALUES 
(1, 'Chef de projet'),
(2, 'Developpeur'),
(3, 'Observateur');

INSERT INTO `tw_profil` (`profil_usr_id`, `profil_location_id`, `profil_name`, `profil_fname`, `profil_fphone`, `profil_mphone`, `profil_title_id`, `profil_perso_adress`) VALUES 
(1, 1, 'Soyer', 'Tom', '043256532', '064211233', 1, '10, rue des oublies'),
(2, 2, 'Paul', 'Pierre', '1234567', '32514232', 3, '56, avenue Jack\r\n96432 Paris');

INSERT INTO `tw_title` (`title_id`, `title_name`) VALUES 
(1, 'Developpeur'),
(2, 'Designer'),
(3, 'Graphist');

INSERT INTO `tw_usr` (`usr_id`, `usr_login`, `usr_passwd`, `usr_email`, `usr_date`, `usr_usr_level_id`) VALUES 
(1, 'tom', 'passtom', 'tom@mail.com', '2008-02-21', 1),
(2, 'pierre', 'pierrepass', 'pierre@mail.com', '2008-02-13', 1);

INSERT INTO `tw_usr_level` (`level_id`, `level_name`) VALUES 
(1, 'Administrator Root'),
(2, 'Administrator'),
(3, 'Chef de projet'),
(4, 'Participant');
