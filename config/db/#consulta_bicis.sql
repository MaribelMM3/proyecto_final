SET SQL_SAFE_UPDATES = 0;
use bicingbcn;

select * from flota;
select * from estacion;
select * from usuarios;
select * from mantenimiento;

-- 1.1 Dar de alta una nueva bicicleta en la estación 2.
INSERT INTO `BicingBCN`.`FLOTA` (`matricula`, `tipo`, `mantenimiento`, `estacion`) VALUES (default, 'electrica', 0, 2);

-- 1.2.	Eliminar la bicicleta con matricula 14 de la flota.
delete from flota where matricula = 14;

-- 1.3.	Dar de alta un usuario con DNI 11111111A.
insert into `BicingBCN`.`USUARIOS` (`DNI`, `nombre`, `apellidos`, `email`, `telefono`, `pagado`, `alta`) 
VALUES ('11111111a', 'nombre1', 'apellidos1', 'aaa@aaa.es', 111111111, 1, default);

-- 1.4.	Obtener las matrículas y los tipos de bicicletas de toda la flota. 
select matricula, tipo from flota;

-- 1.5.	Obtener los DNI y el estado de pago de los usuarios. 
Select DNI, pagado from usuarios;

-- 1.6.	Obtener el DNI de los usuarios cuya alta sea anterior a 1 de febrero ordenados por antiguedad. 
Select DNI, alta from usuarios where alta < '2019-02-01 08:39:53' ORDER BY alta asc;

-- 1.7.	Contar los usuarios dados de alta en enero. 
select count(*) from usuarios where alta between '2019-01-01 00:00:01' and '2019-01-31 23:59:59';

-- 1.8.	Obtener la ubicación de las estaciones con capacidad mayor o igual a 7 bicicletas.
Select direccion from estacion where capacidad >= 7;

-- 1.9.	Obtener el nombre y email de los usuarios con estado 0 en pagado (impagos). 
Select nombre, email from usuarios where pagado = 0;

-- 1.10. Cambiar los apellidos (poner como Martínez) del usuario con DNI 44444444D.
update usuarios set apellidos = 'Martinez' where DNI = '44444444D';

-- 1.11. Contar cuántas bicicletas eléctricas hay en la estación de eixample. 
select count(*) from flota where estacion = 2 and tipo = 'electrica';

 -- 1.12. Cambiar una bicicleta de la estación de sarrià a la de eixample. 
 update flota set estacion = 2 where matricula = 10;

-- 1.13. Obtener la ocupación de cada estación. 
 select F.estacion, count(*) as ocupación, E.capacidad from flota F join estacion E on E.cod_estacion = F.estacion group by F.estacion;
 
 -- 2.1.  Cambiar el estado en flota de tres bicicletas y ponerlas en mantenimiento (averiada). 
update flota set mantenimiento = 1 where matricula IN (3,7,10);

-- 2.2 introducir los avisos de las 3 bicicletas averidadas en la BD de mantenimiento.  
INSERT INTO `bicingbcn`.`mantenimiento` VALUES (default, default, default, 1);
INSERT INTO `bicingbcn`.`mantenimiento` VALUES (default, default, default, 2);
INSERT INTO `bicingbcn`.`mantenimiento` VALUES (default, default, default, 3);

-- 2.3 borrar todos los avisos de las bicicletas averiadas de la BD mantenimiento. 
delete from mantenimiento;

-- 2.4.	Obtener las matriculas de las bicicletas que tienen alerta de mantenimiento (averiadas) y agrupadas por estación.
select F.matricula, E.direccion from flota F join estacion E on E.cod_estacion = F.estacion where mantenimiento = 1;
 
 -- 2.5. Obtener las matriculas de las bicis averiadas por orden de antigüedad en el aviso (de más antiguas a más nuevas).
select * from flota F join estacion E on E.cod_estacion = F.estacion join mantenimiento M on E.cod_estacion = M.estacion  where F.mantenimiento = 1 ; 

-- 3.1 Insertar 3 usos de bicicletas (en tabla alquiler). 
INSERT INTO `bicingbcn`.`alquiler`
(`registro`,`flota`,`usuario`,`inicio`,`inicio_est`,`devolucion`,`devolucion_est`)
VALUES (DEFAULT,4, '44444444D','2019-01-01 00:00:01',2,default,3);
INSERT INTO `bicingbcn`.`alquiler`
(`registro`,`flota`,`usuario`,`inicio`,`inicio_est`,`devolucion`,`devolucion_est`)
VALUES (DEFAULT,6, '22222222B','2019-02-01 00:00:01',2,default,3);
INSERT INTO `bicingbcn`.`alquiler`
(`registro`,`flota`,`usuario`,`inicio`,`inicio_est`,`devolucion`,`devolucion_est`)
VALUES (DEFAULT,8, '44444444D','2019-03-01 00:00:01',3,default,1);
-- consulta general BD alquiler (comprobación)
  select* from alquiler;
  
-- 3.2 Consulta del tiempo de duración de los alquileres del usuario DNI 44444444D (Martínez).
select *, timestampdiff (day, inicio, devolucion) as dias_uso from alquiler where usuario = '44444444D';

 
-- 3.2 consulta del tiempo de duracion de los alquileres del usuario DNI 44444444D (Martinez)
select *, TIMESTAMPDIFF (day,inicio, devolucion) as dias_uso from alquiler where usuario = '44444444D';