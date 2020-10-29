<?php

    /*
     * FUNCIONES
     */
     
    //Funciones de acceso a BD
    include_once("lib/lib.php");


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
        insertarEmpleado($dni,$nombre,$apellidos,$email,$telefono,$fechanac,$cargo,$estado);

        //Si todo ha ido bien, redirigimos a index.php
        header("Location: index.php");
    }

    //Acción de BORRAR un empleado
    if (isset($_GET['delete'])) {
        //Recibimos todos los datos del empleado y filtramos la entrada
        $id = filtrado($_GET['delete']);

        //Conectar a BD y hacer delete
        borrarEmpleado($id);

        //Si todo ha ido bien, redirigimos a index.php
        header("Location: index.php");  
    }

    //Acción de BORRAR VARIOS empleados
    if (isset($_GET['deleteSome'])) {
        $ids = explode("-",$_GET['deleteSome']);
        borrarVariosEmpleados($ids);

        //Si todo ha ido bien, redirigimos a index.php
        header("Location: index.php");         
    }

    //Acción de RECUPERAR empleado para MODIFICARLO
    if (isset($_GET['update'])) {
        //Recibimos todos los datos del empleado y filtramos la entrada
        $id = filtrado($_GET['update']);

        //Recuperar los datos de ese empleado para mostrarlos después
        $empleado = hacerSelectId($id);

        //Si todo ha ido bien, redirigimos a index.php
        $url = "Location: index.php?accion=update&dni=".$empleado['dni'];
        $url .= "&nombre=".$empleado['nombre'];
        $url .= "&apellidos=".$empleado['apellidos'];
        $url .= "&email=".$empleado['email'];
        $url .= "&telefono=".$empleado['telefono'];
        $url .= "&fechanac=".$empleado['fechanac'];
        $url .= "&cargo=".$empleado['cargo'];
        $url .= "&estado=".$empleado['estado'];
        $url .= "&id=".$empleado['id']; //Para pasar al modal el identificador de empleado
        header($url);  
    }

    //Acción de MODIFICAR el empleado
    if (isset($_POST['update'])) {
        //Recibimos todos los datos del empleado y filtramos la entrada
        $dni = filtrado($_POST['dni']);
        $nombre = filtrado($_POST['nombre']);
        $apellidos = filtrado($_POST['apellidos']);
        $email = filtrado($_POST['email']);
        $telefono = filtrado($_POST['telefono']);
        $fechanac = $_POST['fechanac'];
        $cargo = filtrado($_POST['cargo']);
        $estado = filtrado($_POST['estado']);
        $id = filtrado($_POST['id']);

        modificarEmpleado($id,$dni,$nombre,$apellidos,$email,$telefono,$fechanac,$cargo,$estado);

        header("Location: index.php");

    }


?>