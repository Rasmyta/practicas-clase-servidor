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
						<h2>EMPLEADOS</h2>
					</div>
					<div class="col-sm-8">
						<a href="#addEmpleadoModal" class="btn btn-success" data-toggle="modal"><span>Añadir Empleado</span></a>
						<a href="#deleteEmpleadoModal" class="btn btn-danger" data-toggle="modal"> <span>Eliminar</span></a>	
					</div>
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
                    </tr>
                </thead>
                <tbody>
<?php
		//Mostramos los empleados desde la BD
		$conexion = conectar("2daw");

		$empleados = hacerSelect($conexion);

		//Recorremos los resultados
		foreach($empleados as $empleado){
?>
		            <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="<?php echo $empleado['id'];?>">
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
							<!--
							<a href="#editEmpleadoModal<?php echo $empleado['id']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							-->
							<a href="controlador.php?delete=<?php echo $empleado['id'];?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
                    </tr>
<?php
		}

		//Cerrar conexión
		$conexion = null;
?>
                </tbody>
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
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Borrar Empleado</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>¿Estás seguro que quieres borrar este registro?</p>
						<p class="text-warning"><small>Esta acción no pudo ser realizada.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>                                		                            