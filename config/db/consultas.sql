SET SQL_SAFE_UPDATES = 0;
use gesfleet;

select * from `inventario`;
select * from `select_prov` where `select_terr_id_terr` = 2;
select * from `select_project` where `select_prov_id_prov` = 1;
select * from `select_project` where `select_prov_id_prov` = 6;
SELECT `matricula` FROM `inventario` WHERE `matricula` = '$matricula';

insert into `inventario` (`id_vehiculo`, `matricula`, `tipo`, `estado`, `departamento`, `territorio`, `provincia`, `proyecto`) values (default, '1234BBB', 'Moto',  'En activo', 'UM', 'Catalunya', 'Barcelona', 'DIBA');
insert into `inventario` (`id_vehiculo`, `matricula`, `tipo`, `estado`, `departamento`, `territorio`, `provincia`, `proyecto`) values (default, '$matricula','$tipo','$estado','$departamento', '$territorio', '$provincia', '$proyecto');
INSERT INTO inventario VALUES(NULL,'$matricula','$tipo','$estado','$departamento', '$territorio', '$provincia', '$proyecto');

SELECT `matricula` FROM `inventario` WHERE `matricula` = '1234BBB';
select id_vehiculo, matricula, tipo, estado, departamento, S.nom_terr, P.nom_prov, R.nom_project from inventario I join select_terr S join select_prov P join select_project R on I.territorio = S.id_terr and I.provincia = P.id_prov and I.proyecto = R.id_project;
select distinct id_vehiculo, matricula, tipo, estado, departamento, S.nom_terr, P.nom_prov, R.nom_project 
from inventario I join select_terr S join select_prov P join select_project R on I.territorio = S.id_terr and I.provincia = P.id_prov and I.proyecto = R.id_project
;




