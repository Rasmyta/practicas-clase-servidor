<?php

    /*
     * FUNCIONES
     */
     
    //Funciones de acceso a BD
    include_once("lib/lib.php");


    /*
     * CONTROLADOR
     */ 

    //// ACCIONES PARA EMPLEADOS
    // -----------------------------------------------------------

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

    //// ACCIONES PARA PROYECTOS
    // -----------------------------------------------------------

    //Acción de BORRAR un proyecto
    if (isset($_GET['delete_pro'])) {
        //Recibimos todos los datos del proyecto y filtramos la entrada
        $id = filtrado($_GET['delete_pro']);

        //Conectar a BD y hacer delete
        borrarProyecto($id);

        //Si todo ha ido bien, redirigimos a proyectos.php
        header("Location: proyectos.php");  
    }  

    //Acción de INSERTAR un proyecto
    if (isset($_POST['add_pro'])) {
        //Recibimos todos los datos del proyecto y filtramos la entrada
        $nombre = filtrado($_POST['nombre']);
        $descripcion = filtrado($_POST['descripcion']);
        $numTrabajadores = filtrado($_POST['numTrabajadores']);
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFinPrevista = $_POST['fechaFinPrevista'];
        
        //Conectar a BD y hacer insert
        insertarProyecto($nombre,$descripcion,$numTrabajadores,$fechaInicio,$fechaFinPrevista);

        //Si todo ha ido bien, redirigimos a index.php
        header("Location: proyectos.php");
    }  

    //Acción de RECUPERAR proyecto para MODIFICARLO
    if (isset($_GET['update_pro'])) {
        //Recibimos todos los datos del empleado y filtramos la entrada
        $id = filtrado($_GET['update_pro']);

        //Recuperar los datos de ese proyecto para mostrarlos después
        $proyecto = hacerSelectIdProyecto($id);

        //Si todo ha ido bien, redirigimos a proyectos.php
        $url = "Location: proyectos.php?accion=update_pro";
        $url .= "&nombre=".$proyecto['nombre'];
        $url .= "&descripcion=".$proyecto['descripcion'];
        $url .= "&numTrabajadores=".$proyecto['numTrabajadores'];
        $url .= "&fechaInicio=".$proyecto['fechaInicio'];
        $url .= "&fechaFinPrevista=".$proyecto['fechaFinPrevista'];
        $url .= "&id=".$proyecto['id']; //Para pasar al modal el identificador de proyecto
       
        header($url);  
    }
    
    
    //Acción de MODIFICAR el proyecto
    if (isset($_POST['update_pro'])) {
        //Recibimos todos los datos del empleado y filtramos la entrada
        $nombre = filtrado($_POST['nombre']);
        $descripcion = filtrado($_POST['descripcion']);
        $numTrabajadores = filtrado($_POST['numTrabajadores']);
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFinPrevista = $_POST['fechaFinPrevista'];
        $id = filtrado($_POST['id']);

        modificarProyecto($id,$nombre,$descripcion,$numTrabajadores,$fechaInicio,$fechaFinPrevista);

        header("Location: proyectos.php");

    }    

   //// ACCIONES PARA TRABAJA
    // -----------------------------------------------------------

    //Ver los empleados de un proyecto
    if (isset($_GET['verParticipantes'])) {
        $idProyecto = filtrado($_GET['verParticipantes']);
        $nombreProyecto = filtrado($_GET['nombre']);

        //Llamamos directamente al fichero trabaja.php con el id de proyecto
        header("Location: trabaja.php?verParticipantes=".$idProyecto."&nombre=".$nombreProyecto);

    }

    //Eliminar participante de un proyecto
    if (isset($_GET['delete_particip'])) {
        $idEmpleado = filtrado($_GET['delete_particip']);
        $idProyecto = filtrado($_GET['idProyecto']);
        $fechaInicio = filtrado($_GET['fechaInicio']);
        $nombreProyecto = filtrado($_GET['nombreProyecto']);

        //Llamamos a la BD a eliminar ese participante en ese proyecto en esa fecha de inicio
        deleteParticipante($idEmpleado,$idProyecto,$fechaInicio);

        header("Location: trabaja.php?verParticipantes=".$idProyecto."&nombre=".$nombreProyecto);

    }

    //Añadir un empleado al proyecto
    if (isset($_POST['addEmpleadoProyecto'])) {
        //Nos quedamos con el id de empleado seleccionado y la fecha de inico
        $idEmpleado = filtrado($_POST['integrantes']);
        $fechaInicio = filtrado($_POST['fechaInicio']);
        $idProyecto = $_POST['idProyecto'];
        $nombreProyecto = $_POST['nombreProyecto'];
        $puesto = filtrado($_POST['puesto']);

        //Lo añadimos a la BD
        $error = addEmpleadoProyecto($idProyecto,$idEmpleado,$fechaInicio,$puesto);

        header("Location: trabaja.php?verParticipantes=".$idProyecto."&nombre=".$nombreProyecto."&error=".$error);

    }



?>