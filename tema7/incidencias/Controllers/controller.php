<?php
    include_once("../autoload.php");
    use Incidencias\IncidenciaDB;
    use Incidencias\ClienteDB;

    //Acción de cargar los libros en la página principal
    if (isset($_POST['action'])) {
        
       //Insertar incidencia
       if ($_POST['action'] == "newInc") {
            //Comprobar que el teléfono existe
            $cliente = ClienteDB::getId($_POST['movil']);

            //Comprobamos que el móvil es de un cliente
            if (isset($cliente)) {
                if($cliente != false) {
                    IncidenciaDB::insertInc($_POST['latitud'],$_POST['longitud'],$_POST['ciudad'],$_POST['direccion'],$_POST['etiqueta'],$_POST['descripcion'],$cliente->getId());
                    echo "Incidencia insertada correctamente";
                } else {
                    echo "Teléfono móvil no encontrado, regístrese y pruebe después.";
                }
            }
       }

    }


?>