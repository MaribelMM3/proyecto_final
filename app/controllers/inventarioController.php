<?php defined('BASEPATH') or exit ('No se permite acceso directo');

class inventarioController extends Controller {

    public function index() {
        $this->render('index');
    }

    public function desplegable_cont(){
    	$id_provincia = ($_POST['provincia']); //aunque JS recoge el #id, en PHP se trabaja con el name. 
    	// recogeré el $_POST de ajax (prov), require del inventarioModel y llamar al método(prov se convertirá en $prov, variable PHP) de inventarioModel
    	require_once(ROOT . DS . 'app' . DS . 'models' . DS . 'inventarioModel.php');
    	//instancio a la clase inventario y llamo al método desplegable_mod dentro de inventarioModel
    	$provincia = new inventario;
    	$proyecto=$provincia->desplegable_mod($id_provincia);

    	$contentenido='';
    	foreach ($contentenido as $value) 
    	{
    		$contentenido += '<option value="'.$proyecto[i]['id_project'].'">'.$proyecto[i]['nom_project'].'</option>'; 
    	}


    	// for ($i=0; $i < $proyecto.lenght-1 ; $i++) 
    	// { 
    	// 	$contentenido += '<option value="'.$proyecto[i]['id_project'].'">'.$proyecto[i]['nom_project'].'</option>'; 
    	// }
    	return $contentenido;
	}

}


// 1array(3) {
//   [0]=>
//   array(3) {
//     ["id_project"]=>
//     string(1) "1"
//     ["nom_project"]=>
//     string(9) "BNC Ayto."
//     ["select_prov_id_prov"]=>
//     string(1) "1"
//   }
//   [1]=>
//   array(3) {
//     ["id_project"]=>
//     string(1) "2"
//     ["nom_project"]=>
//     string(4) "DIBA"
//     ["select_prov_id_prov"]=>
//     string(1) "1"
//   }
//   [2]=>
//   array(3) {
//     ["id_project"]=>
//     string(1) "7"
//     ["nom_project"]=>
//     string(12) "Privados_BCN"
//     ["select_prov_id_prov"]=>
//     string(1) "1"
//   }
// }