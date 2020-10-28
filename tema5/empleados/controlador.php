<?php

    /*
     * FUNCIONES
     */
     
    //Funciones de acceso a BD
    include_once("lib/lib.php");

    //Función para filtrar los valores recibidos de un formulario
    function filtrado($datos){
        $datos = trim($datos);                                  // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos);                          // Elimina backslashes \
        $datos = filter_var($datos,FILTER_SANITIZE_STRING);     // Elimina todas las etiquetas    
        return $datos;
    }


    /*
     * CONTROLADOR
     */ 

    //Acción de INSERTAR un empleado
    if (isset($_POST['add'])) {
        //Recibimos todos los datos del empleado y filtramos la entrada
        $dni = filtrado($_POST['dni']);
        $nombre = filtrado($_POST['nombre']);
        $apellidos = filtrado($_POST['apellidos']);
        $email = filtrado($_POST['email']);
        $telefono = filtrado($_POST['telefono']);
        $fechanac = $_POST['fechanac'];
        $cargo = filtrado($_POST['cargo']);
        $estado = filtrado($_POST['estado']);
        
        //Conectar a BD y hacer insert
        $conexion = conectar("2daw");
        insertarEmpleado($conexion,$dni,$nombre,$apellidos,$email,$telefono,$fechanac,$cargo,$estado);
        $conexion = null;

        //Si todo ha ido bien, redirigimos a index.php
        header("Location: index.php");
    }

    //Acción de BORRAR un empleado
    if (isset($_GET['delete'])) {
        //Recibimos todos los datos del empleado y filtramos la entrada
        $id = filtrado($_GET['delete']);

        //Conectar a BD y hacer delete
        $conexion = conectar("2daw");
        borrarEmpleado($conexion,$id);
        $conexion = null;

        //Si todo ha ido bien, redirigimos a index.php
        header("Location: index.php");  
    }



?>