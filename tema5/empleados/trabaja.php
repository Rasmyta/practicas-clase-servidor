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
                    <div class="col-sm-9">
						<h2>PROYECTO: 
                            <?php
                                //Sacamos el nombre del proyecto recibido por GET
                                if (isset($_GET['nombre']))
                                    echo filtrado($_GET['nombre']);
                            ?>
                        </h2>
                        <h4 class='text-primary'>Integrantes del proyecto</h4>
					</div>
					<div class="col-sm-3">
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
        $id = filtrado($_GET['verParticipantes']);
		$empleados = obtenerEmpleadosPorIdProyecto($id);

		//Recorremos los resultados
		foreach($empleados as $empleado){
?>
		            <tr>
                        <td><?php echo $empleado['nombre']; ?></td>
                        <td><?php echo $empleado['fechaInicio']; ?></td>
						<td><?php echo $empleado['fechaFin']; ?></td>
						<td><?php echo $empleado['puesto']; ?></td>
                        <td>
							
							<a href="controlador.php?update_particip=<?php echo $empleado['id']; ?>"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="controlador.php?delete_particip=<?php echo $empleado['id'];?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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