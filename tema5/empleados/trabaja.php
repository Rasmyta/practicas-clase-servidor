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
						<a href="#addIntegranteModal" class="btn btn-success" data-toggle="modal"><span>Añadir Integrante</span></a>
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
        //Mostramos los empleados de este proyecto. $id es el id del proyecto
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
							
                            <a href="controlador.php?update_particip=<?php echo $empleado['id_empleado']; ?>&idProyecto=<?php echo $empleado['id_proyecto']; ?>&fechaInicio=<?php echo $empleado['fechaInicio']; ?>&nombreProyecto=<?php echo filtrado($_GET['nombre']); ?>">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
                            <a href="controlador.php?delete_particip=<?php echo $empleado['id_empleado']; ?>&idProyecto=<?php echo $empleado['id_proyecto']; ?>&fechaInicio=<?php echo $empleado['fechaInicio']; ?>&nombreProyecto=<?php echo filtrado($_GET['nombre']); ?>">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
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
    

<!-- MODALES PARA AÑADIR INTEGRANTE Y MODIFICAR -->
<div class="modal fade" id="addIntegranteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir integrante al proyecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="controlador.php" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Empleados</label>
            <select name="integrantes" id="">
<?php
            //Sacamos todos los empleados de la empresa
            $empleados = obtenerEmpleados();

            //Me recorro los empleados y genero <option> de un desplegable
            foreach($empleados as $empleado) {
                echo "<option value='".$empleado['id']."'>";
                echo $empleado['nombre']." ".$empleado['apellidos'];
                echo "</option>";
            }
?>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Fecha Inicio:</label>
            <input id="fechaInicio" type="date" onchange='checkDate()' class="form-control" name="fechaInicio" required>
          </div>  
          <div class="form-group">
            <label for="message-text" class="col-form-label">Puesto:</label>
            <input type="text" class="form-control" name="puesto" required>
          </div>           
          <input type="hidden" name="idProyecto" value="<?php echo $id;?>">
          <input type="hidden" name="nombreProyecto" value="<?php echo filtrado($_GET['nombre']);?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input id="addEmpleado" type="submit" name="addEmpleadoProyecto" class="btn btn-primary" value="Añadir" disabled>
      </div>
        </form>
    </div>
  </div>
</div>


<!-- MODALES PARA AÑADIR INTEGRANTE Y MODIFICAR -->
<div class="modal fade" id="ErroresModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Errores</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <h6 class='text-danger'>Entrada duplicada</h6>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<script>
    function checkDate() {
        var elemento;
        elemento = document.getElementById("fechaInicio");
        //if (elemento.value > "2020-11-11")
        document.getElementById("addEmpleado").disabled = false;
    }

    var posicion = window.location.search.indexOf("error=Duplicada");
    if (posicion > 1) {
		$("#ErroresModal").modal("show");
	}
</script>

    </body>
</html>  