<?php
    include_once("../autoload.php");
    use Incidencias\IncidenciaDB;
    use Incidencias\ClienteDB;
    use Incidencias\VistaIndex;


    //Acción de cargar los libros en la página principal
    if (isset($_POST['action'])) {
        
       //Insertar incidencia
       if ($_POST['action'] == "newInc") {
            //Comprobar que el teléfono existe
            $cliente = ClienteDB::getId($_POST['movil']);

            IncidenciaDB::insertInc($_POST['latitud'],$_POST['longitud'],$_POST['ciudad'],$_POST['direccion'],$_POST['etiqueta'],$_POST['descripcion'],$cliente->getId());
            //VistaIndex::render();
       }

    }


?>