<?php
namespace Incidencias;

class VistaIncidencia {

    public static function renderIncidencias($incidencias) {
?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>INCIDENCIAS</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabla" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Latitud</th>
                    <th>Longitud</th>
                    <th>Ciudad</th>
                    <th>Dirección</th>
                    <th>Etiqueta</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Cliente</th>
                  </tr>
                  </thead>
                  <tbody>
                
<?php
    foreach($incidencias as $incidencia) {
        echo "<tr>";
        echo "<td>".$incidencia->getLongitud()."</td>";
        echo "<td>".$incidencia->getLatitud()."</td>";
        echo "<td>".$incidencia->getCiudad()."</td>";
        echo "<td>".$incidencia->getDireccion()."</td>";
        echo "<td>".$incidencia->getEtiqueta()."</td>";
        echo "<td>".$incidencia->getDescripcion()."</td>";
        echo "<td>".$incidencia->getEstado()."</td>";
        echo "<td>".$incidencia->getIdCliente()."</td>";

        echo "</tr>";
    }

?>

            </tbody>
            </table>


            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 


 <?php

    }
}

?>   