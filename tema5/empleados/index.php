<?php
	include_once("lib/cabecera.php");
	include_once("lib/lib.php");
?>

<body>

	<div class="container mt-5">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
						<h6><a href='index.php' class='mr-2'>EMPLEADOS</a><a href='proyectos.php'>PROYECTOS</a></h6>
					</div>
                </div>
            </div>
        </div>
	</div>

    <div class="container mt-5">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
						<h2>EMPLEADOS</h2>
					</div>
					<div class="col-sm-8">
						<a href="#addEmpleadoModal" class="btn btn-success" data-toggle="modal"><span>Añadir Empleado</span></a>
						<a href="#deleteEmpleadoModal" class="btn btn-danger" data-toggle="modal"> <span>Eliminar</span></a>	
					</div>
				</div>
				<div class="row float-right">
					<form action='index.php' method='get'>
						<div class='row form-group mb-2 pr-2'>
							<label class="col-sm-2"> Filtro: </label>
							<input class="col-sm-6"type="text" name="filtro" class="form-control">
							<input class="col-sm-3 ml-2 btn btn-primary" type='submit' name='buscar' value='Buscar'>
						</div>						

					</form>
				</div>
			</div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th></th>
                        <th>DNI</th>
                        <th>NOMBRE</th>
						<th>APELLIDOS</th>
                        <th>EMAIL</th>
                        <th>TELÉFONO</th>
                        <th>FECHA NAC.</th>
                        <th>CARGO</th>
						<th>ESTADO</th>
						<th></th>
                    </tr>
                </thead>
                <tbody>
<?php
		//Comprobar si hemos pulsado el filtro de búsqueda
		$filtro = "";
		if (isset($_GET['filtro'])) {
			$filtro = filtrado($_GET['filtro']);
		} 

		//Paginador
		if (isset($_GET['pagina'])) {
			$pagina = $_GET['pagina'];
		} else {
			$pagina = 1;
		}

		//Mostramos los empleados desde la BD
		$empleados = hacerSelect($filtro,$pagina);

		//Recorremos los resultados
		foreach($empleados as $empleado){
?>
		            <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="empleados" value="<?php echo $empleado['id'];?>">
								<label for="checkbox1"></label>
							</span>
						</td>
                        <td><?php echo $empleado['dni']; ?></td>
                        <td><?php echo $empleado['nombre']; ?></td>
						<td><?php echo $empleado['apellidos']; ?></td>
						<td><?php echo $empleado['email']; ?></td>
						<td><?php echo $empleado['telefono']; ?></td>
						<td><?php echo $empleado['fechanac']; ?></td>
						<td><?php echo $empleado['cargo']; ?></td>
						<td><?php echo $empleado['estado']; ?></td>
                        <td>
							
							<a href="controlador.php?update=<?php echo $empleado['id']; ?>"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="controlador.php?delete=<?php echo $empleado['id'];?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
                    </tr>
<?php
		}

?>
				</tbody>
				<tfooter>
					<tr>
						<td colspan='10'>
<?php
		//Calculamos el número total de páginas consultando BD
		$np = numPaginas($filtro);

?>							
							<a href="index.php?filtro=<?php echo $filtro; ?>&pagina=<?php if ($pagina > 1) echo ($pagina-1); else echo 1; ?>">Anterior</a>
							<a href="index.php?filtro=<?php echo $filtro; ?>&pagina=<?php if ($pagina < $np) echo ($pagina+1); else echo $np; ?>">&nbsp;Siguiente</a>
						</td>
					</tr>
					
				</tfooter>
			</table>

			
        </div>
	</div>
	
	<!-- Add Empleado Modal HTML -->
	<div id="addEmpleadoModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method='POST' action='controlador.php'>
					<div class="modal-header">						
						<h4 class="modal-title">Añadir Empleado</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label> DNI</label>
							<input type="text" name="dni" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" name="nombre" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Apellidos</label>
							<input type="text" name="apellidos" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Teléfono</label>
							<input type="tel" name="telefono" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Fecha Nacimiento</label>
							<input type="date" name="fechanac" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Cargo</label>
							<input type="text" name="cargo" class="form-control" required>
						</div>	
						<div class="form-group">
							<label>Estado</label>
							<select name="estado" class="form-control">
								<option value="activo">Activo</option>
								<option value="erte">En Erte</option>
								<option value="ex">Exempleado</option>
							</select>
						</div>			
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name='add' class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>


	<!-- Delete Modal HTML -->
	<div id="deleteEmpleadoModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">						
						<h4 class="modal-title">Borrar Empleado</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>¿Estás seguro que quieres borrar este registro?</p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="button" class="btn btn-danger" onclick="deleteSome()" value="Delete">
					</div>
			</div>
		</div>
	</div>

		<!-- Update Empleado Modal HTML -->
		<div id="updateEmpleadoModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method='POST' action='controlador.php'>
					<div class="modal-header">						
						<h4 class="modal-title">Modificar Empleado</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="id" value="<?php if (isset($_GET['id'])) echo filtrado($_GET['id']);  ?>">					
						<div class="form-group">
							<label> DNI</label>
							<input type="text" name="dni" class="form-control"  
								   value="<?php if (isset($_GET['dni'])) echo filtrado($_GET['dni']);  ?>" required>
						</div>
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" name="nombre" class="form-control" 
								   value="<?php if (isset($_GET['nombre'])) echo filtrado($_GET['nombre']);  ?>"  required>
						</div>
						<div class="form-group">
							<label>Apellidos</label>
							<input type="text" name="apellidos" class="form-control" 
							       value="<?php if (isset($_GET['apellidos'])) echo filtrado($_GET['apellidos']);  ?>"  required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" 
							       value="<?php if (isset($_GET['email'])) echo filtrado($_GET['email']);  ?>"  required>
						</div>
						<div class="form-group">
							<label>Teléfono</label>
							<input type="tel" name="telefono" class="form-control" 
							value="<?php if (isset($_GET['telefono'])) echo filtrado($_GET['telefono']);  ?>"  required>
						</div>
						<div class="form-group">
							<label>Fecha Nacimiento</label>
							<input type="date" name="fechanac" class="form-control" 
								   value="<?php if (isset($_GET['fechanac'])) echo filtrado($_GET['fechanac']);  ?>"  required>
						</div>
						<div class="form-group">
							<label>Cargo</label>
							<input type="text" name="cargo" class="form-control" 
							       value="<?php if (isset($_GET['cargo'])) echo filtrado($_GET['cargo']);  ?>"  required>
						</div>	
						<div class="form-group">
							<label>Estado</label>
							<select name="estado" class="form-control">
								<?php
								$estado = "";
								if (isset($_GET['estado'])) 
									$estado = filtrado($_GET['estado']);
							
								switch ($estado) {
									case "erte": 
										echo "<option value='activo'>Activo</option>";
										echo "<option value='erte' selected>En Erte</option>";
										echo "<option value='ex'>Exempleado</option>";
										break;
									case "activo": 
										echo "<option value='activo' selected>Activo</option>";
										echo "<option value='erte'>En Erte</option>";
										echo "<option value='ex'>Exempleado</option>";
										break;
									case "ex": 
										echo "<option value='activo'>Activo</option>";
										echo "<option value='erte'>En Erte</option>";
										echo "<option value='ex' selected>Exempleado</option>";
										break;
									default:
										echo "<option value='activo'>Activo</option>";
										echo "<option value='erte'>En Erte</option>";
										echo "<option value='ex'>Exempleado</option>";
										break;																												
								}


								?>
								
							</select>
						</div>			
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name='update' class="btn btn-success" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
		
		//Abrimos el modal del update si la url lleva accion=update
		var accion = window.location.search.indexOf("accion=update");
		if (accion == 1) {
			$("#updateEmpleadoModal").modal("show");
		}
		


		//Para borrar múltiples registros
		function deleteSome() {
			var checkboxes = document.getElementsByName('empleados');
			var url="controlador.php?deleteSome=";
			for (var checkbox of checkboxes) {
				if (checkbox.checked) {
					url += checkbox.value + "-";
				}
			}
			window.location.assign(url);
		}

	</script>

</body>
</html>                                		                            