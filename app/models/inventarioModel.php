<?php defined('BASEPATH') or exit ('No se permite acceso directo');

class inventario extends Model {

    public function get_vehiculos()
    {
        $connect  = Model::getInstanceDB();
        // $sql = "SELECT * from inventario";
        $sql = "select distinct id_vehiculo, matricula, tipo, estado, departamento, S.nom_terr, P.nom_prov, R.nom_project from inventario I join select_terr S join select_prov P join select_project R on I.territorio = S.id_terr and I.provincia = P.id_prov and I.proyecto = R.id_project;";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $vehiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $vehiculos;
    }

	//DESPLEGABLES DEPENDIENTES////////////
	public function desplegable_mod1($id_territorio){

		$connect = Model::getInstanceDB();
		$sql = 'select * from `select_prov` where `select_terr_id_terr` = :id;'; //consulta de sql
		$stmt = $connect->prepare($sql);
		$stmt->bindParam(':id', $id_territorio); //viene del controlador y es el valor de $id_territorio = $_POST['terr'];
		$stmt->execute();
		$provincia = $stmt->fetchAll(PDO::FETCH_ASSOC); //devuelve a $proyecto un array asociativo de la consulta. 
		$rows = $stmt->rowCount(); //te da la cantidad de filas que tiene la consulta. 

		return $provincia;
	}

	
	public function desplegable_mod2($id_provincia){

		$connect = Model::getInstanceDB();
		$sql = 'select * from `select_project` where `select_prov_id_prov` = :id;'; //consulta de sql
		$stmt = $connect->prepare($sql);
		$stmt->bindParam(':id', $id_provincia); //viene del controlador y es el valor de $id_provincia = $_POST['prov'];
		$stmt->execute();
		$proyecto = $stmt->fetchAll(PDO::FETCH_ASSOC); //devuelve a $proyecto un array asociativo de la consulta. 
		$rows = $stmt->rowCount(); //te da la cantidad de filas que tiene la consulta. 

		return $proyecto;
	}


//POPUP REGISTRO VEHÍCULO////////////
	public function registro_vehiculo_mod($matricula,$tipo,$estado,$departamento, $territorio, $provincia, $proyecto)
	{
        $connect = Model::getInstanceDB();
        $sql = "SELECT * from inventario where matricula = :matricula;";
       
        $stmt = $connect->prepare($sql);
		$stmt->bindParam(':matricula', $matricula); //viene del controlador y es el valor de $matricula = $_POST['prov'];
		$stmt->execute();
		$rows = $stmt->rowCount(); //te da la cantidad de filas que tiene la consulta. 

		// $insert=$this->connect->query("SELECT `matricula` FROM `inventario` WHERE `matricula` = '$matricula'"); 

        if($rows==0){
        	$sql = ("INSERT into `inventario` (`id_vehiculo`, `matricula`, `tipo`, `estado`, `departamento`, `territorio`, `provincia`, `proyecto`) VALUES (default, :matricula, :tipo, :estado, :departamento, :territorio, :provincia, :proyecto);");
            $stmt = $connect->prepare($sql);
        	$stmt->bindParam(':matricula', $matricula);
        	$stmt->bindParam(':tipo', $tipo);
        	$stmt->bindParam(':estado', $estado);
        	$stmt->bindParam(':departamento', $departamento);
        	$stmt->bindParam(':territorio', $territorio);
        	$stmt->bindParam(':provincia', $provincia);
        	$stmt->bindParam(':proyecto', $proyecto);        	

        	if($stmt->execute())
        	{
              return true;
            }else{
            	return false;
            }

        }else{
            return 'Este vehículo ya existe';
        }
    }

//POPUP EDICIÓN VEHÍCULO//////////////
    public function get_by_id($matricula)
    {
        $connect  = Model::getInstanceDB();
        // $sql = "SELECT * from inventario";
        $sql = "select * from `inventario` where `matricula` = '$matricula';";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $vehiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $vehiculos;
    }

    public function edicion_vehiculo_mod($matricula,$estado,$departamento, $territorio, $provincia, $proyecto)
    {
        $connect = Model::getInstanceDB();
        $sql = ("UPDATE `inventario` SET `estado`=:estado, `departamento`=:departamento, `territorio`=:territorio, `provincia`=:provincia, `proyecto`=:proyecto WHERE `matricula`=:matricula;");
            $stmt = $connect->prepare($sql);
            $stmt->bindParam(':matricula', $matricula);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':departamento', $departamento);
            $stmt->bindParam(':territorio', $territorio);
            $stmt->bindParam(':provincia', $provincia);
            $stmt->bindParam(':proyecto', $proyecto); 
        $stmt->execute();
    }

        
    //ELIMINAR VEHÍCULO//////////////
    public function DEL_by_id($matricula)
    {
        $connect  = Model::getInstanceDB();
        // $sql = "SELECT * from inventario";
        $sql = "DELETE FROM `inventario` WHERE `matricula`=:matricula;";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->execute();
   }


    // //BUSCADOR
    // static function check($word)
    // {
    //     $connect  = Model::getInstanceDB();
    //     $sql = "SELECT * FROM `inventario` WHERE * LIKE concat('%', $word, '%')";
    //     $stmt = $connect->prepare($sql);
    //     $stmt->execute();
    //     $vehiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     return $vehiculos;
    // }
}
