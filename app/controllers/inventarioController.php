<?php defined('BASEPATH') or exit ('No se permite acceso directo');

class inventarioController extends Controller {

    public function index() {
        //pedir a la bd todos los vehiculos
        require_once(ROOT . DS . 'app' . DS . 'models' . DS . 'inventarioModel.php');
        $inventario = new inventario;
        $vehiculos=$inventario->get_vehiculos();
        $vehiculos_html = $this->vehiculo_structure($vehiculos);
        $d["vehiculos"] = $vehiculos_html;
        $this->set($d);
        $this->render('index');
    }

    private function vehiculo_structure($vehiculos)
    {
        $dato = "";
        foreach ($vehiculos as $value) 
        {
            $dato .='<tr>';
                    $dato .='<td style="background: none;"><img id="icon_table" src="webroot/img/icon_turismo.png"></td>';
                    $dato .='<td style="text-transform: uppercase;">'.$value["matricula"].'</td>';
                    $dato .='<td>'.$value["tipo"].'</td>';
                    $dato .='<td>'.$value["estado"].'</td>';
                    $dato .='<td>'.$value["departamento"].'</td>                       ';
                    $dato .='<td>'.$value["nom_terr"].'</td>';
                    $dato .='<td>'.$value["nom_prov"].'</td>';
                    $dato .='<td>'.$value["nom_project"].'</td>';
                    $dato .='<td style="width: 1%; background: none;">';
                        $dato .='<span id="desplegable">';
                         $dato .='<ul class="drop-down closed">';
                            $dato .='<li><p class="nav-button" style="cursor: pointer;">OPCIONES ▼</p></li>              ';
                            $dato .='<li><a href="#">Editar vehículo</a></li>';
                            $dato .='<li><a href="#">Imprimir vehículo</a></li>';
                            $dato .='<li><a href="#">Archivar vehículo</a></li>';
                            $dato .='<li><a href="#">Eliminar vehículo</a></li>';
                         $dato .='</ul>                   ';
                        $dato .='</span>';
                    $dato .='</td>';
            $dato .='</tr>';
        }
        return $dato;
    }

//DESPLEGABLES DEPENDIENTES
    public function desplegable_cont1(){
        $id_territorio = ($_POST['territorio']); //aunque JS recoge sel #id, en PHP se trabaja con el name. 
        // recogeré el $_POST de ajax (prov), require del inventarioModel y llamar al método(prov se convertirá en $prov, variable PHP) de inventarioModel
        require_once(ROOT . DS . 'app' . DS . 'models' . DS . 'inventarioModel.php');
        //instancio a la clase inventario y llamo al método desplegable_mod dentro de inventarioModel
        $territorio = new inventario;
        $provincia=$territorio->desplegable_mod1($id_territorio);

        $contentenido1='';
        foreach ($provincia as $value) 
        {
            $contentenido1 .= '<option value='.$value["id_prov"].'>'.$value["nom_prov"].'</option>'; 
        }

        echo json_encode($contentenido1);//una petición de ajax siempre se hace sobre echo y json.
    }


    public function desplegable_cont2(){
    	$id_provincia = ($_POST['provincia']); //aunque JS recoge el #id, en PHP se trabaja con el name. 
    	// recogeré el $_POST de ajax (prov), require del inventarioModel y llamar al método(prov se convertirá en $prov, variable PHP) de inventarioModel
    	require_once(ROOT . DS . 'app' . DS . 'models' . DS . 'inventarioModel.php');
    	//instancio a la clase inventario y llamo al método desplegable_mod dentro de inventarioModel
    	$provincia = new inventario;
    	$proyecto=$provincia->desplegable_mod2($id_provincia);

    	$contentenido2='';
    	foreach ($proyecto as $value) 
    	{
    		$contentenido2 .= '<option value='.$value["id_project"].'>'.$value["nom_project"].'</option>'; 
    	}

    	echo json_encode($contentenido2);//una petición de ajax siempre se hace sobre echo y json.
	}

//DATOS POPUP REGISTRO
    public function registro_vehiculo_cont(){
        $matricula = ($_POST['matricula']); //aunque JS recoge el #id, en PHP se trabaja con el name. 
        $tipo = ($_POST['tipo']);
        $estado = ($_POST['estado']);
        $departamento = ($_POST['departamento']);
        $territorio = ($_POST['territorio']);
        $provincia = ($_POST['provincia']);
        $proyecto = ($_POST['proyecto']);

        require_once(ROOT . DS . 'app' . DS . 'models' . DS . 'inventarioModel.php');
        //instancio a la clase inventario y llamo al método desplegable_mod dentro de inventarioModel
        $vehiculo = new inventario;
        $mensaje=$vehiculo->registro_vehiculo_mod($matricula, $tipo, $estado, $departamento, $territorio, $provincia, $proyecto);

        $this->index();

        // $respuesta='';
        // foreach ($proyecto as $value) 
        // {
        //     $respuesta .= '<option value='.$value["id_project"].'>'.$value["nom_project"].'</option>'; 
        // }

        // echo json_encode($respuesta);//una petición de ajax siempre se hace sobre echo y json.
    }





}

