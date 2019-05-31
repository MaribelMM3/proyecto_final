<?php defined('BASEPATH') or exit ('No se permite acceso directo');
 
define('DB_NAME', 'gesfleet');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

define('TEMPLATE_VIEW', 'default');
define('INDEX_CONTROLLER', 'home');
define('INDEX_ACTION', 'index');

//con esta nueva ruta podremos especificar en core>router.class que 
//cuando el usuario esté logado no redireccione a la home, 
//si no a la página que seleccionemos como nueva home, en este caso a 'inventario'
define('INDEX_CONTROLLER_LOG', 'inventario');
define('INDEX_ACTION_LOG', 'index');


define('BASE_DOMAIN', 'localhost');
define('BASE_DIR_URL', '/proyecto_final/');
define('BASE_DOMAIN_DIR_URL', 'http://localhost/proyecto_final/');


