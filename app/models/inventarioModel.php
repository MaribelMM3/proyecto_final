<?php defined('BASEPATH') or exit ('No se permite acceso directo');

class inventario extends Model {

	public function desplegable_mod($id_provincia){

		$connect = Model::getInstanceDB();
		$sql = 'select * from `select_project` where `select_prov_id_prov` = :id;'; //consulta de sql
		$stmt = $connect->prepare($sql);
		$stmt->bindParam(':id', $id_provincia); //viene del controlador y es el valor de $id_provincia = $_POST['prov'];
		$stmt->execute();
		$proyecto = $stmt->fetchAll(PDO::FETCH_ASSOC); //devuelve a $proyecto un array asociativo de la consulta. 
		$rows = $stmt->rowCount(); //te da la cantidad de filas que tiene la consulta. 



		return $proyecto;



	}
}
