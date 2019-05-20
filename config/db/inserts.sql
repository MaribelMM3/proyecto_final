SET SQL_SAFE_UPDATES = 0;
use gesfleet;

-- -----------------------------------------------------
-- Data for table `gesfleet`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `gesfleet`;
INSERT INTO `gesfleet`.`users` (`ID`, `user`, `psw`) VALUES (1, 'Xavi', 'xavi');
INSERT INTO `gesfleet`.`users` (`ID`, `user`, `psw`) VALUES (2, 'David', 'david');
INSERT INTO `gesfleet`.`users` (`ID`, `user`, `psw`) VALUES (3, 'Maribel', 'maribel');

COMMIT;


-- -----------------------------------------------------
-- Data for table `gesfleet`.`select_prov`
-- -----------------------------------------------------
START TRANSACTION;
USE `gesfleet`;
INSERT INTO `gesfleet`.`select_prov` (`id_prov`, `nom_prov`) VALUES (1, 'Barcelona');
INSERT INTO `gesfleet`.`select_prov` (`id_prov`, `nom_prov`) VALUES (2, 'Girona');
INSERT INTO `gesfleet`.`select_prov` (`id_prov`, `nom_prov`) VALUES (3, 'Lleida');
INSERT INTO `gesfleet`.`select_prov` (`id_prov`, `nom_prov`) VALUES (4, 'Tarragona');

COMMIT;

-- -----------------------------------------------------
-- Data for table `gesfleet`.`select_project`
-- -----------------------------------------------------
START TRANSACTION;
USE `gesfleet`;
INSERT INTO `gesfleet`.`select_project` (`id_project`, `nom_project`, `select_prov_id_prov`) VALUES (1, 'BNC Ayto.', 1);
INSERT INTO `gesfleet`.`select_project` (`id_project`, `nom_project`, `select_prov_id_prov`) VALUES (2, 'DIBA', 1);
INSERT INTO `gesfleet`.`select_project` (`id_project`, `nom_project`, `select_prov_id_prov`) VALUES (3, 'Girona Ayto.', 2);
INSERT INTO `gesfleet`.`select_project` (`id_project`, `nom_project`, `select_prov_id_prov`) VALUES (4, 'Girona Dip.', 2);
INSERT INTO `gesfleet`.`select_project` (`id_project`, `nom_project`, `select_prov_id_prov`) VALUES (5, 'Lleida Ayto.', 3);
INSERT INTO `gesfleet`.`select_project` (`id_project`, `nom_project`, `select_prov_id_prov`) VALUES (6, 'Reus Ayto.', 4);
INSERT INTO `gesfleet`.`select_project` (`id_project`, `nom_project`, `select_prov_id_prov`) VALUES (7, 'Privados_BCN', 1);
INSERT INTO `gesfleet`.`select_project` (`id_project`, `nom_project`, `select_prov_id_prov`) VALUES (8, 'Privados_Girona', 2);
INSERT INTO `gesfleet`.`select_project` (`id_project`, `nom_project`, `select_prov_id_prov`) VALUES (9, 'Privados_Lleida', 3);
INSERT INTO `gesfleet`.`select_project` (`id_project`, `nom_project`, `select_prov_id_prov`) VALUES (10, 'Privados_Tarragona', 4);

COMMIT;
