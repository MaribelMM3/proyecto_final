<?php defined('BASEPATH') or exit ('No se permite acceso directo');?>

<!-- TABLERO DE DATOS  -->

<?php
    if (isset($_SESSION['username'])) 
    {
?>
<div class="box">
	<!-- <div class="title_div">
		<span class="title">FLOTA</span>
	</div> -->
	
	<div class="container">
		<div class="title_div">
			<span class="title">FLOTA</span>
		</div>
		<span id="desplegable">
			<input type="button" name="registro_vehiculo" value="Registrar vehículo" id="btn_registro" onclick="btn_registro()">
		</span>
		<span id="desplegable">
			<form class="search" action="">
			  <input type="search" placeholder="Qué quieres encontrar?" required>
			  <button type="submit">Buscar</button>
			</form>   
		</span>

			<table class="default" id="tabla_cont_inv">
					<tr>
						<th></th>
						<th>Matrícula</th>
						<th>Tipo</th>
						<th>Status</th>
						<th>Departamento</th>
						<th>Territorio</th>
						<th>Provincia</th>
						<th>Proyecto</th>						
						<th>Acciones</th>
					</tr>
					<?php echo $vehiculos;?>
			</tbody>
			</table>
		</div> 

	<!-- FORMULARIO REGISTRO VEHÍCULOS -->
		<div id="div_form">
			<div id="div_form2">
				    <form id="reg_vehiculo" action="inventario/registro_vehiculo_cont" method="POST">  
				    <div>
				      <h3>Registrar un vehículo</h3>
				      <div id="div_line">
					      <label>Matrícula</label>
					      <input type="text" name="matricula" id="matricula" placeholder="1234abc" style="text-transform: uppercase;" required onkeyup="valmatricula(event)">
					      <span id="valmatricula" style="float: right; margin-right: 12%; font-size: xx-large; color: #cc0000;"></span>
					  </div>
				      <br>
				      <div id="div_line">
				      <label>Tipo de vehículo</label>
				      	<select name="tipo">
						   <option value="Moto">Moto</option> 
						   <option value="Turismo">Turismo</option> 
						   <option value="4x4">4x4</option>
						   <option value="Furgoneta">Furgoneta</option> 
						   <option value="Camión">Camión</option> 
						</select>
					</div>
				      <br>
				      <div id="div_line">
				      <label>Estado del vehículo</label>
				      	<select name="estado">
							   <option value="En activo">En activo</option> 
							   <option value="En taller">En taller</option> 
							   <option value="Baja">Baja</option>
							   <option value="Pendiente">Pendiente</option>
							</select>
					   </div>
				      <br>
				      <div id="div_line">
				      <label>Departamento</label>
					      <select name="departamento">
							   <option value="UM">UM</option> 
							   <option value="Técnico">Técnico</option> 
							   <option value="Coordinación">Coordinación</option>
							   <option value="Almacén">Almacén</option>
							   <option value="Dirección">Dirección</option>
							</select>
						</div>
				      <br>
				      <div id="div_line">
				      <label>Territorio</label>
				      	<select name="territorio" id="select_terr">
							   <option value="1">Cataluña</option> 
							   <option value="2">Euskadi</option> 
						</select>
						</div>
						<br>
				      <div id="div_line">
				      <label>Provincia</label>
				      	<select name="provincia" id="select_prov">
							   <!-- <option value="1">Barcelona</option> 
							   <option value="2">Girona</option> 
							   <option value="3">Lleida</option>
							   <option value="4">Tarragona</option>
							   <option value="5">Araba</option> 
							   <option value="6">Bizkaia</option> 
							   <option value="7">Gipuzkoa</option> -->
							</select>
						</div>
						<br>
				      <div id="div_line">
				      <label>Proyecto</label>
				      	<select name="proyecto" id="select_project">
							<!-- <option value="1">BNC Ayto.</option> 
							   <option value="2">DIBA</option> 
							   <option value="3">Girona Ayto.</option>
							   <option value="4">Girona Dip.</option>
							   <option value="5">Lleida Ayto.</option>
							   <option value="6">Reus Ayto.</option>
							   <option value="7">Privados</option> -->
							</select>
						</div>
						<br>
						<div id="botones">
					      <input type="submit" name="Add" value="Añadir" id="btn_add">
					      <input type="button" name="Cancel" value="Cancelar" id="btn_cancel">
					    </div>
				    </div>
				  </form>  
			</div><!-- /div_form2 -->			
		</div><!-- /div_form -->
 <?php }
	 else{header('Location: '.BASE_DOMAIN_DIR_URL.'webroot/404.php');}
?>

<!-- FORMULARIO EDICIÓN VEHÍCULOS -->
		<div id="div_edit">
			<div id="div_edit2">
				    <form id="mod_vehiculo" action="inventario/edición_vehiculo_cont" method="POST">  
				    <div>
				      <h3>Editar vehículo</h3>
				      <div id="div_line">
					      <label>Matrícula</label>
					      <input type="text" name="matricula" id="matricula" placeholder="1234abc" style="text-transform: uppercase;" required onkeyup="valmatricula(event)" readonly>
					      <span id="valmatricula" style="float: right; margin-right: 12%; font-size: xx-large; color: #cc0000;"></span>
					  </div>
				      <br>
				      <div id="div_line">
				      <label>Tipo de vehículo</label>
				      	<select name="tipo" id="tipo" readonly>
						</select>
					</div>
				      <br>
				      <div id="div_line">
				      <label>Estado del vehículo</label>
				      	<select name="estado" id="estado">
				      		<option value="En activo">En activo</option> 
							<option value="En taller">En taller</option> 
							<option value="Baja">Baja</option>
							<option value="Pendiente">Pendiente</option>
						</select>
					   </div>
				      <br>
				      <div id="div_line">
				      <label>Departamento</label>
					    <select name="departamento" id="departamento">
					      	<option value="UM">UM</option> 
							<option value="Técnico">Técnico</option> 
							<option value="Coordinación">Coordinación</option>
							<option value="Almacen">Almacen</option>
							<option value="Dirección">Dirección</option>
						</select>
						</div>
				      <br>
				      <div id="div_line">
				      <label>Territorio</label>
				      	<select name="territorio" id="select_terr">
							<option value="1">Cataluña</option> 
							<option value="2">Euskadi</option>
						</div>
						<br>
				      <div id="div_line">
				      <label>Provincia</label>
				      	<select name="provincia" id="select_prov">				      		
						</select>
						</div>
						<br>
				      <div id="div_line">
				      <label>Proyecto</label>
				      	<select name="proyecto" id="select_project">
				      	</select>
						</div>
						<br>
						<div id="botones">
					      <input type="submit" name="Add" value="Añadir" id="btn_add">
					      <input type="button" name="Cancel" value="Cancelar" id="btn_cancel">
					    </div>
				    </div>
				  </form>  
			</div><!-- /div_form2 -->			
		</div><!-- /div_form -->

<!-- <img src="webroot/img/icon_moto.png" style="width: 2em; padding-top: .5%;">
<img src="webroot/img/icon_turismo.png" style="width: 3em; float: left; margin-left: .5%;"> -->
