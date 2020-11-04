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
						<h2>TRABAJADORES DEL PROYECTO 
                            <?php
                                if (isset($_GET['nombre']))
                                    echo filtrado($_GET['nombre']);
                            ?>
                        </h2>
					</div>
					<div class="col-sm-8">
						<a href="#addProyectoModal" class="btn btn-success" data-toggle="modal"><span>Añadir Empleado</span></a>
					</div>
				</div>
			</div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>FECHA INICIO</th>
						<th>FECHA FIN</th>
						<th>PUESTO</th>
						<th></th>
                    </tr>
                </thead>
                <tbody>
<?php
		//Mostramos los empleados de este proyecto
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
							<a href="controlador.php?verParticipantes=<?php echo $proyecto['id']; ?>">
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
    

    </body>
</html>  