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
						<h2>PROYECTOS</h2>
					</div>
					<div class="col-sm-8">
						<a href="#addProyectoModal" class="btn btn-success" data-toggle="modal"><span>Añadir Proyecto</span></a>
					</div>
				</div>
				<div class="row float-right">
					<form action='proyectos.php' method='get'>
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
                        <th>NOMBRE</th>
                        <th>DESCRIPCION</th>
						<th>NÚMERO MÁXIMO</th>
						<th>INTEGRANTES</th>
                        <th>FECHA INICIO</th>
                        <th>FECHA FIN PREVISTA</th>
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


		//Mostramos los proyectos desde la BD
		$proyectos = hacerSelectProyectos($filtro);

		//Recorremos los resultados
		foreach($proyectos as $proyecto){
?>
		            <tr>
                        <td><?php echo $proyecto['nombre']; ?></td>
                        <td><?php echo $proyecto['descripcion']; ?></td>
						<td>
							<?php echo $proyecto['numTrabajadores']; ?>
						</td>
						<td>
							<a href="controlador.php?verParticipantes=<?php echo $proyecto['id']; ?>&nombre=<?php echo $proyecto['nombre']; ?>">
								<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE55A;</i>
							</a>
						</td>
						<td><?php echo $proyecto['fechaInicio']; ?></td>
						<td><?php echo $proyecto['fechaFinPrevista']; ?></td>
                        <td>
							
							<a href="controlador.php?update_pro=<?php echo $proyecto['id']; ?>"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="controlador.php?delete_pro=<?php echo $proyecto['id'];?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
                    </tr>
<?php
		}

?>
				</tbody>
				<tfooter>
					<!-- Aquí iba el paginador -->					
				</tfooter>
			</table>

			
        </div>
	</div>
	
	<!-- Add proyecto Modal HTML -->
	<div id="addProyectoModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method='POST' action='controlador.php'>
					<div class="modal-header">						
						<h4 class="modal-title">Añadir proyecto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label> Nombre</label>
							<input type="text" name="nombre" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Descripción</label>
							<input type="text" name="descripcion" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Número trabajadores</label>
							<input type="text" name="numTrabajadores" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Fecha Inicio</label>
							<input type="date" name="fechaInicio" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Fecha Fin Prevista</label>
							<input type="date" name="fechaFinPrevista" class="form-control" required>
						</div>									
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name='add_pro' class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>


		<!-- Update proyecto Modal HTML -->
		<div id="updateProyectoModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method='POST' action='controlador.php'>
					<div class="modal-header">						
						<h4 class="modal-title">Modificar proyecto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="id" value="<?php if (isset($_GET['id'])) echo filtrado($_GET['id']);  ?>">					
						<div class="form-group">
							<label> Nombre</label>
							<input type="text" name="nombre" class="form-control"  
								   value="<?php if (isset($_GET['nombre'])) echo filtrado($_GET['nombre']);  ?>" required>
						</div>
						<div class="form-group">
							<label>Descripción</label>
							<input type="text" name="descripcion" class="form-control" 
								   value="<?php if (isset($_GET['descripcion'])) echo filtrado($_GET['descripcion']);  ?>"  required>
						</div>
						<div class="form-group">
							<label>Número trabajadores</label>
							<input type="text" name="numTrabajadores" class="form-control" 
							       value="<?php if (isset($_GET['numTrabajadores'])) echo filtrado($_GET['numTrabajadores']);  ?>"  required>
						</div>
						<div class="form-group">
							<label>Fecha Inicio</label>
							<input type="date" name="fechaInicio" class="form-control" 
								   value="<?php if (isset($_GET['fechaInicio'])) echo filtrado($_GET['fechaInicio']);  ?>"  required>
						</div>	
						<div class="form-group">
							<label>Fecha Fin Prevista</label>
							<input type="date" name="fechaFinPrevista" class="form-control" 
								   value="<?php if (isset($_GET['fechaFinPrevista'])) echo filtrado($_GET['fechaFinPrevista']);  ?>"  required>
						</div>	
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name='update_pro' class="btn btn-success" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
		
		//Abrimos el modal del update si la url lleva accion=update
		var accion = window.location.search.indexOf("accion=update_pro");
		if (accion == 1) {
			$("#updateProyectoModal").modal("show");
		}
		

	</script>

</body>
</html>                                		                            