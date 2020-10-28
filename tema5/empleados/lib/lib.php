<?php

    //ACCESO A BASES DE DATOS

    //Conexión a BD
    function conectar($basededatos) {
        $MySQL_host = "localhost";
        $MySQL_user = "admin";
        $MySQL_password = "admin";
        try {
		    $dsn = "mysql:host=$MySQL_host;dbname=$basededatos";
            $conexion = new PDO($dsn, $MySQL_user,  $MySQL_password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
		} catch (PDOException $e){
		    echo $e->getMessage();
		}   
    }

    //Hacer consulta
    function hacerSelect($conexion) {
        $consulta = "SELECT * FROM empleados ORDER BY apellidos";
        //Para evitar problemas con caracteres especiales
        $conexion->query("SET NAMES utf8");
        //Preparamos la consulta
        $stmt = $conexion->prepare($consulta);
        //Ejecutamos la consulta
        $stmt->execute();
        //Devolvemos los resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Insertar nuevo empleado
    function insertarEmpleado($conexion,$dni,$nombre,$apellidos,$email,$telefono,$fechanac,$cargo,$estado) {
        try {
            //Para evitar problemas con caracteres especiales
            $conexion->query("SET NAMES utf8");
            //Preparamos la consulta
            $consulta = "INSERT INTO empleados (dni,nombre,apellidos,email,telefono,fechanac,cargo,estado) VALUES (";
            $consulta .= ":dni, :nombre, :apellidos, :email, :telefono, :fechanac, :cargo, :estado)";
            $stmt = $conexion->prepare($consulta);

            $stmt->bindParam(':dni', $dni);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellidos', $apellidos);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':fechanac', $fechanac);
            $stmt->bindParam(':cargo', $cargo);
            $stmt->bindParam(':estado', $estado);

            $stmt->execute();
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }
    }

    //Borrar empleado
    function borrarEmpleado($conexion,$id) {
        try {
            //Preparamos la consulta
            $consulta = "DELETE FROM empleados WHERE id = :id";
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(':id',$id);

            $stmt->execute();
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }


    }

?>