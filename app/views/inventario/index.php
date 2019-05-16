<?php defined('BASEPATH') or exit ('No se permite acceso directo');?>

<!-- TABLERO DE DATOS  -->
<div class="box">
	<div class="title_div">
		<span class="title">FLOTA</span>
	</div>
	
	<div class="container">
		<span id="desplegable">
			<input type="button" name="opciones_inventario" value="Registrar vehículo" id="btn_registro" onclick="btn_registro()">
		</span>
		<span id="desplegable">
			<form class="search" action="">
			  <input type="search" placeholder="Qué quieres encontrar?" required>
			  <button type="submit">Buscar</button>
			</form>   
		</span>

			<table class="default">
					<tr>
						<th>Icon</th>
						<th>Matrícula</th>
						<th>Tipo</th>
						<th>Status</th>
						<th>Departamento</th>
						<th>Proyecto</th>
						<th>Provincia</th>
						<th>Territorio</th>
						<th>Acciones</th>
					</tr>
					<tr>
						<td><img src="webroot/img/icon_turismo.png" style="width: 2em;"></td>
						<td>111AAA</td>
						<td>Turismo</td>
						<td>Activo</td>
						<td>Coordinación</td>
						<td>Ayto. BCN</td>
						<td>Barcelona</td>
						<td>Cataluña</td>
						<td style="width: 1%;">
							<span id="desplegable">
					         <ul class="drop-down closed">
							    <li><p class="nav-button" style="cursor: pointer;">OPCIONES ▼</p></li>			    
							    <li><a href="#">Editar vehículo</a></li>
							    <li><a href="#">Imprimir vehículo</a></li>
							    <li><a href="#">Archivar vehículo</a></li>
							    <li><a href="#">Eliminar vehículo</a></li>
							 </ul>			         
							</span>
						</td>
				</tr>
			</tbody>
			</table>
		</div> 

	<!-- FORMULARIO -->
		<div id="div_form">
			<div id="div_form2">
				    <form id="reg_vehiculo" action="add2.php" method="POST">  
				    <div>
				      <h3>Registrar un vehículo</h3>
				      <div id="div_line">
					      <label>Matrícula</label>
					      <input type="text" name="matricula" id="matricula" placeholder="Matrícula" required onkeyup="valmatricula(event)">
					      <span id="valmatricula" style="float: right; margin-right: 12%; font-size: xx-large; color: #cc0000;"></span>
					  </div>
				      <br>
				      <div id="div_line">
				      <label>Tipo de vehículo</label>
				      	<select name="vehiculo">
						   <option value="1">Moto</option> 
						   <option value="2">Turismo</option> 
						   <option value="3">4x4</option>
						   <option value="4">Furgoneta</option> 
						   <option value="5">Camión</option> 
						</select>
					</div>
				      <br>
				      <div id="div_line">
				      <label>Estado del vehículo</label>
				      	<select name="departamento">
							   <option value="1">En activo</option> 
							   <option value="2">En taller</option> 
							   <option value="3">Baja</option>
							   <option value="3">Pendiente</option>
							</select>
					   </div>
				      <br>
				      <div id="div_line">
				      <label>Departamento</label>
					      <select name="departamento">
							   <option value="1">UM</option> 
							   <option value="2">Técnico</option> 
							   <option value="3">Coordinación</option>
							   <option value="3">Almacén</option>
							   <option value="4">Dirección</option>
							</select>
						</div>
				      <br>
				      <div id="div_line">
				      <label>Provincia</label>
				      	<select name="provincia" id="select_prov">
							   <option value="1">Barcelona</option> 
							   <option value="2">Girona</option> 
							   <option value="3">Lleida</option>
							   <option value="3">Tarragona</option>
							</select>
						</div>
						<br>
				      <div id="div_line">
				      <label>Proyecto</label>
				      	<select name="proyecto" id="select_project">
<!-- 							   <option value="1">BNC Ayto.</option> 
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


<!-- <img src="webroot/img/icon_moto.png" style="width: 2em; padding-top: .5%;">
<img src="webroot/img/icon_turismo.png" style="width: 3em; float: left; margin-left: .5%;"> -->
