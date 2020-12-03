<?php
namespace Incidencias;

class VistaCliente {

    public static function renderClientes($clientes) {
?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CLIENTES</h1>
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
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Localidad</th>
                    <th>Móvil</th>
                    <th>DNI</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                
<?php
    foreach($clientes as $cliente) {
        echo "<tr>";
        echo "<td>".$cliente->getNombre()."</td>";
        echo "<td>".$cliente->getDireccion()."</td>";
        echo "<td>".$cliente->getLocalidad()."</td>";
        echo "<td>".$cliente->getMovil()."</td>";
        echo "<td>".$cliente->getDNI()."</td>"; 
        echo "<td>";
        echo "<a class='text-danger ml-2'><i class='fas fa-trash-alt'></i></a>";
        echo "</td>";        
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