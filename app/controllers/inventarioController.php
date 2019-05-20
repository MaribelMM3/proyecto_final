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
    	foreach ($proyecto as $value) 
    	{
    		$contentenido .= '<option value='.$value["id_project"].'>'.$value["nom_project"].'</option>'; 
    	}

    	echo json_encode($contentenido);//una petición de ajax siempre se hace sobre echo y json.
	}

}

